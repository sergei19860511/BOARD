<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $userFavoritePosts = auth('web')
            ->user()
            ->favorites()
            ->with('post')
            ->get();

        return view('favorite', compact('userFavoritePosts'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addToFavorites(Request $request)
    {
        $userId = $request->user()->id;
        $postId = $request->input('post_id');

        $favorite = Favorite::query()->where('user_id', $userId)->where('post_id', $postId)->first();
        if ($favorite) {
            return redirect()->route('post.index')->with('message', 'Объявление было добавлено ранее');
        }

        Favorite::query()->create(['user_id' => $userId, 'post_id' => $postId]);

        return redirect()->route('post.index');
    }

    /**
     * @return RedirectResponse
     */
    public function deleteFavorites(Favorite $userFavoritePost)
    {
        $userFavoritePost->delete();

        return redirect()->route('post.index');
    }
}
