<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Resources\Api\TagResource;
use App\Models\Tag;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::all();
        return TagResource::collection($tags);
    }
}
