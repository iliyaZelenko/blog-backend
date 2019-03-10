<?php

use Illuminate\Database\Seeder;

class ContentRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws Exception
     */
    public function run(): void
    {
        $count = 100;

        factory(\App\Models\ContentRating::class, $count)->create();
    }
}

