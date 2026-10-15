<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::withTrashed()->get();

        return response()->json($posts);
    }

    public function delete_post(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'post deleted successfully'
        ]);
    }

    public function force_delete_post(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();

        return response()->json([
            'message' => 'post force deleted successfully'
        ]);
    }

    public function restore_post(string $id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return response()->json([
            'message' => 'post restored successfully'
        ]);
    }

    public function get_post(string $id)
    {
        $post = Post::findOrFail($id);

        return response()->json($post);
    }

    public function edit_post(Request $request, string $id)
    {

        $request->validate([
            'author_name' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->author_name = $request->author_name;
        $post->save();

        return response()->json([
            'message' => 'post updated successfully'
        ]);
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

        return response()->json([
            'message' => 'post has been added successfully'
        ]);
    }
}
