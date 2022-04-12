<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Resources\Api\PostResource;
use App\Models\Post;

use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Post $post)
    {
        return new PostResource($post);
    }
}
