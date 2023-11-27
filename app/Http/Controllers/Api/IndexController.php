<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    /**
     * @return PostCollection
     */
    public function index()
    {
        //return new PostCollection(Post::query()->orderByDesc('id')->get());
        return new PostCollection(Post::query()
            ->orderByDesc('id')
            ->paginate(5)
        );
    }

    /**
     * @return PostResource
     */
    public function latest()
    {
        //return Post::query()->orderByDesc('id')->first();
        // К примеру объявления выходят не так часто и последнее сохраним в кэше

        return new PostResource(Cache::remember('posts', '60*60*24', function () {
            return Post::query()->orderByDesc('id')->first();
        }));
    }

    /**
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
