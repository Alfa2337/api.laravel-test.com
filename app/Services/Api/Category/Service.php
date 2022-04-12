<?php

namespace App\Services\Api\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $category = Category::firstOrCreate($data, $data);

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }

        return $category;
    }


    public function update($category, $data)
    {
        try {
            DB::beginTransaction();
            
            $resault = $category->update($data);
            $resault = $category->fresh();

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }

        return $resault;
    }
}
