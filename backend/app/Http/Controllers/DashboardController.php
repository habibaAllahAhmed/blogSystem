<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::withTrashed()->get();

        return view("pages.dashboard", compact(['posts']));
    }
}
