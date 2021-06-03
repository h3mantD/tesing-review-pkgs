<?php

use App\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        factory(App\Article::class, 10)->make()->each(function ($ar) use ($users) {
            $ar->user_id = $users->random()->id;
            $ar->save();
        });
    }
}
