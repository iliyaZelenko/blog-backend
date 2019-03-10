<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this
            ->call(UsersTableSeeder::class)
            ->call(CategoriesTableSeeder::class)
            ->call(TagsTableSeeder::class)
            ->call(PostsTableSeeder::class)
            ->call(CommentsTableSeeder::class)
            ->call(ContentRatingTableSeeder::class)
        ;
    }
}
