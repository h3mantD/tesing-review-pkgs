<?php

namespace App;

use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Models\Rating;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
use Illuminate\Database\Eloquent\Model;

use App\User;

class Post extends Model implements ReviewRateable
{
	use ReviewRateableTrait;
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function getPostsWithReviewsGt($limit) {
		$result = [];
		$posts = Post::all();


		foreach($posts as $p) {
			$count = $p->getAllRatings($p)->count();
			if($count >= $limit ) {
				$a = [
					'post_id' => $p->id,
					'count of reivews' => $count,
				];

				array_push($result, $a);
			}
		}

		return $result;
	}

	public function getPostsWithReviewsLt($limit) {
		$result = [];
		$posts = Post::all();


		foreach($posts as $p) {
			$count = $p->getAllRatings($p)->count();
			if($count <= $limit ) {
				$a = [
					'post_id' => $p->id,
					'count of reivews' => $count,
				];

				array_push($result, $a);
			}
		}

		return $result;
	}
}
