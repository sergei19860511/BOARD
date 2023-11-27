<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private const POST_VALIDATOR = [
        'title' => 'required|min:10',
        'text' => 'required',
        'price' => 'required|numeric'
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = auth('web')->user()->posts()->latest('id')->get();
        return view('home', compact('posts'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $valid = $request->validate(self::POST_VALIDATOR);
        auth('web')->user()->posts()->create([
           'title' => $valid['title'],
           'text' => $valid['text'],
           'price' => $valid['price'],
        ]);

        return redirect()->route('home');
    }

    /**
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $valid = $request->validate(self::POST_VALIDATOR);

        $post->fill([
           'title' => $valid['title'],
           'text' => $valid['text'],
           'price' => $valid['price'],
        ]);
        $post->save();

        return redirect()->route('home');
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home');
    }
}
