<?php

use App\ReviewLike;
use App\User;
use Codebyray\ReviewRateable\Models\Rating;
use Illuminate\Database\Seeder;

class ReviewLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $ratings = Rating::all();
        factory(ReviewLike::class, 50)
            ->make()
            ->each(function ($like) use ($users, $ratings) {
                $like->user_id = $users->random()->id;
                $like->rating_id = $ratings->random()->id;
                $like->save();
            });
    }
}
