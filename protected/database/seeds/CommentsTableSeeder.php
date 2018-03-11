<?php

use Illuminate\Database\Seeder;
use App\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Comment::create([

                'body' => $faker->paragraph,
				'user_id' => 1,
				'post_id' => 1,
				'up_vote' => 0,
				'down_vote' => 0
            ]);
        }
    }
}
