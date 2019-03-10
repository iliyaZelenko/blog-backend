<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class CommentsTableSeeder
     *
     * @throws Exception
     */
    public function run()
    {
        $count = 35;
        $savedCount = \App\Models\Comment::count();
        $createCommentsCounts = $count - $savedCount;
        $createCommentsForFoundPost = 3;

        if ($createCommentsCounts < 1) return;

        while (1) {
            /** @var \App\Models\Post $post */
            // $post = \App\Models\Post::inRandomOrder()->first();
            /** @var \App\Models\Post $post */
            $post = \App\Models\Post::find(1);

            for ($k = 0; $k < $createCommentsForFoundPost; $k++) {
                $comment = factory(\App\Models\Comment::class)->make([
                    'comment_id' => $this->getRepliedCommentId($post),
                ]);

                $post->comments()->save($comment);

                if (--$createCommentsCounts < 1) return;
            }
        }
    }

    private function getRepliedCommentId($post)
    {
        if (random_int(1, 3) < 3) { // если $savedCount && то всеранво null
            $repliedComment = $post->comments()->inRandomOrder()->first();

            if ($repliedComment) {
                return $repliedComment->id;
            }
        }

        return null;
    }
}
