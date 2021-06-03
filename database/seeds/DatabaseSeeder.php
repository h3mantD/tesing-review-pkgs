<?php

use App\Article;
use App\Post;
use App\ReviewReply;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => "sasuke uchia",
            'email' => "sasuke@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        factory(App\User::class, 10)->create();

        $this->call([PostSeeder::class, ArticleSeeder::class]);

        $i = 10;
		while ($i--) {
			Post::find(rand(1, 5))->rating(
				[
					"title" => Str::random(5),
					"body" => Str::random(10),
					"rating" => rand(1, 5),
				],
				User::find(rand(1, 10))
			);

			Article::find(rand(1, 5))->rating(
				[
					"title" => Str::random(5),
					"body" => Str::random(10),
					"rating" => rand(1, 5),
				],
				User::find(rand(1, 10))
			);
		}

        $this->call([ReviewReplySeeder::class]);
    }
}
