<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::query()->latest('id')->get();

        return view('index', compact('posts'));
    }

    /**
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }
}
