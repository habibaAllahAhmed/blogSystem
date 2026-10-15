<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Event\Test\PostConditionFinishedSubscriber;

class PostController extends Controller
{
    private function find_post(string $id, bool $isTrashed = false)
    {
        $post = $isTrashed ? Post::withTrashed()->find($id) : Post::find($id);

        if ($post == null) {
            abort(404);
        }

        return $post;
    }

    public function add_index()
    {
        return view("pages.add_post");
    }

    public function add_post(Request $request)
    {
        $request->validate([
            'author_name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();
        $post->author_name = $request->author_name;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('success', 'post has been added successfully');
    }

    public function delete_post(Request $request, string $id)
    {
        $post = $this->find_post($id);
        $post->delete();

        return redirect()->route('dashboard');
    }

    public function restore_post(Request $request, string $id)
    {
        $post = $this->find_post($id, true);
        $post->restore();

        return redirect()->route('dashboard');
    }

    public function force_delete_post(Request $request, string $id)
    {
        $post = $this->find_post($id, true);
        $post->forceDelete();

        return redirect()->route('dashboard');
    }

    public function edit_index(string $id)
    {

        $post = $this->find_post($id);
        return view("pages.edit_post", compact(['post']));
    }

    public function edit_post(Request $request, string $id)
    {

        $request->validate([
            'author_name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = $this->find_post($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_name = $request->author_name;
        $post->save();
        return Redirect()->route('dashboard');
    }
}
