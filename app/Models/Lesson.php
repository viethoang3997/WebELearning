<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Review;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    public $timestamps = false;
    protected $table = 'lessons';
    protected $fillable = ['name', 'image', 'description', 'requirement', 'time', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function userLesson()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function getNumberUserLesson()
    {
        return $this->userLesson()->count();
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'lesson_id');
    }

    public function getNumberLessonReviewAttribute()
    {
        return $this->review()->count();
    }

    public function getLessonRatingAttribute()
    {
        $avgRating = $this->review()->avg('rating');
        return floor($avgRating * 100) / 100;
    }

    public function getLessonRatingCount($star)
    {
        $query = $this->review()->where('rating', $star)->count();
        return $query;
    }

    public function getLessonPrecentRating($star)
    {
        $query = $this->getLessonRatingCount($star);
        $allRatingCount = ($this->number_lesson_review) ?: 1;
        $percent = $query / $allRatingCount * 100;
        return $percent;
    }

    public function getCheckUserLearnAttribute()
    {
        $check = [];
        if (Auth::user()) {
            $check = $this->user()->wherePivot("user_id", Auth::user()->id)->get();
        }
        return count($check);
    }
}
