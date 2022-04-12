<?php

namespace App\Http\Controllers\Api\Post;

use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return response(null, 204);
    }
}
