<?php

namespace App\Http\Controllers\Api\Tag;

use App\Http\Requests\Api\Tag\UpdateRequest;
use App\Http\Resources\Api\TagResource;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(Tag $tag, UpdateRequest $request)
    {
        $data = $request->validated();
        $resault = $this->service->update($tag, $data);

        return new TagResource($resault);
    }
}
