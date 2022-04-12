<?php

namespace App\Http\Controllers\Api\Tag;

use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return response(null, 204);
    }
}
