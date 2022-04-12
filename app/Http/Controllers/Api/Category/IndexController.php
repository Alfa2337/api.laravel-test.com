<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $category = Category::all();
        return CategoryResource::collection($category);
    }
}
