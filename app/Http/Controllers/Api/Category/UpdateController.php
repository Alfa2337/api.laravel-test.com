<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Requests\Api\Category\UpdateRequest;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(Category $category, UpdateRequest $request)
    {
        $data = $request->validated();
        $category = $this->service->update($category, $data);

        return $category instanceof Category ? new CategoryResource($category) : $category;
    }
}
