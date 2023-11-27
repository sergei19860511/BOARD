<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created(): void
    {
        Cache::forget('posts');
    }
}
