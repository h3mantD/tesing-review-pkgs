<?php

use App\ReviewReply;
use App\User;
use Codebyray\ReviewRateable\Models\Rating;
use Illuminate\Database\Seeder;

class ReviewReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratings = Rating::all();
        $users = User::all();
        factory(ReviewReply::class, 40)
            ->make()
            ->each(function ($reply) use ($ratings, $users) {
                $reply->user_id = $users->random()->id;
                $reply->rating_id = $ratings->random()->id;
                $reply->save();
            });
    }
}
