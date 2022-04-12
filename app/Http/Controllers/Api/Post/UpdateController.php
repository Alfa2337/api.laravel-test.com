<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Api\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $resault = $this->service->update($post, $data);

        return $resault instanceof Post ? new PostResource($post) : $resault;
    }
}
