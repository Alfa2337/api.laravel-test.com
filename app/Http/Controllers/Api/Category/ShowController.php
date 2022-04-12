<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke(Category $category)
    {
        return new CategoryResource($category);
    }
}
