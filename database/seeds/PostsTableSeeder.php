<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws Exception
     */
    public function run(): void
    {
        $count = 15;

        factory(Post::class, $count)->create()->each(function (\App\Models\Post $post) {
            $tagsCount = random_int(3, 8);
            $tagsId = \App\Models\Tag::inRandomOrder()
                ->take($tagsCount)
                ->pluck('id')
                ->all();

            $post->setTags($tagsId);
        });
    }
}

