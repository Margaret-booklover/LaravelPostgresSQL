<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory(100)->create();
        Tag::factory(100)->create();
        $tags = Tag::all();
        // Populate the pivot table
        Article::all()->each(function ($article) use ($tags) {
            $article->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
