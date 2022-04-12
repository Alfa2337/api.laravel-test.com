<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(10)->create();

        foreach ($posts as $post)
        {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }
        // \App\Models\User::factory(10)->create();
    }
}
