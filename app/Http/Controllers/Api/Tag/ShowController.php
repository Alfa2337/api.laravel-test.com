<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Resources\Api\TagResource;
use App\Models\Tag;

class ShowController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        return new TagResource($tag);
    }
}
