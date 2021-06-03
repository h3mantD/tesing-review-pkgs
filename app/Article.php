<?php

namespace App;

use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model implements ReviewRateable
{
	use ReviewRateableTrait;
    public function user() {
        return $this->belongsTo(User::class);
    }
}
