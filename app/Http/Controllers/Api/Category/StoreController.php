<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Requests\Api\Category\StoreRequest;
use App\Http\Resources\Api\CategoryResource;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $resault = $this->service->store($data);

        return new CategoryResource($resault);
    }
}
