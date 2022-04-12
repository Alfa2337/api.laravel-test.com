<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $post = Post::all();
        return PostResource::collection($post);
    }
}
