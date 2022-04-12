<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Requests\Api\Tag\StoreRequest;
use App\Http\Resources\Api\TagResource;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = $this->service->store($data);

        return new TagResource($tag);
    }
}
