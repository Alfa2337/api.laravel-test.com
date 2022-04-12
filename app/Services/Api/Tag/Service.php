<?php

namespace App\Services\Api\Tag;

use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $tag = Tag::firstOrCreate($data, $data);

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }

        return $tag;
    }


    public function update($tag, $data)
    {
        try {
            DB::beginTransaction();

            $resault = $tag->update($data);
            $resault = $tag->fresh();

            DB::commit();
        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }

        return $resault;
    }
}
