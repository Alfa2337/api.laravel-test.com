<?php

namespace App\Services\Api\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;

class Service 
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $categoryId = $this->getCategoryId($data['category']);
            $tagIds = $this->getTagIds($data['tags']);

            unset($data['category'], $data['tags']);
            $data['category_id'] = $categoryId;

            $post = Post::firstOrCreate($data, $data);
            $post->tags()->sync($tagIds);

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $categoryId = $this->getCategoryIdWithUpdate($data['category']);
            $tagIds = $this->getTagIdsWithUpdate($data['tags']);

            unset($data['category'], $data['tags']);
            $data['category_id'] = $categoryId;

            $post->update($data);
            $post->tags()->sync($tagIds);
            $post->fresh();

            DB::commit();

        } catch (Exception $exception) {

            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    private function getCategoryId($category) {
        if (!isset($category['id'])) {
            $category = Category::firstOrCreate($category, $category);
        }
        return $category['id'];
    }

    private function getTagIds($tags) {
        $tagIds = [];

        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::firstOrCreate($tag, $tag);
            }
            $tagIds[] = $tag['id'];
        }
        return $tagIds;
    }

    private function getCategoryIdWithUpdate($item) {
        if (!isset($item['id'])) {
            $category = Category::firstOrCreate($item, $item);
        } else {
            $category = Category::find($item['id']);
            $category->update(['title' => $item['title']]);
            $category->fresh();
        }
        return $category['id'];
    }

    private function getTagIdsWithUpdate($tags) {
        $ids = [];

        foreach ($tags as $item) {
            if (!isset($item['id'])) {
                $tag = Tag::firstOrCreate($item, $item);
            } else {
                $tag = Tag::find($item['id']);
                $tag->update(['title' => $item['title']]);
                $tag->fresh();
            }
            $ids[] = $tag['id'];
        }
        return $ids;
    }
}