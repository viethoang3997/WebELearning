<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Lesson;
use Carbon\Carbon;

class Review extends Model
{
    public $timestamps = true;
    protected $table = 'reviews';
    protected $fillable = ['lesson_id', 'course_id', 'user_id', 'content', 'rating', 'target_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
