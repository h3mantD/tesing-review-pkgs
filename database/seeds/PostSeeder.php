<?php

use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all();
        factory(App\Post::class, 20)->make()->each(function ($post) use ($user) {
            $post->user_id = $user->random()->id;
            $post->save();
        });
    }
}
