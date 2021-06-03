<?php

namespace App;

use Codebyray\ReviewRateable\Models\Rating;
use Illuminate\Database\Eloquent\Model;

class ReviewReply extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function review() {
        return $this->belongsTo(Rating::class);
    }
}
