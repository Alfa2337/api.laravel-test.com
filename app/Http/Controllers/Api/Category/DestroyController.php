<?php

namespace App\Http\Controllers\Api\Category;

use App\Models\Category;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->delete();
        return response(null, 204);
    }
}
