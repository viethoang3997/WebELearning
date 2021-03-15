<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Lesson;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    public $timestamps = false;
    protected $table = 'courses';
    protected $fillable = ['name', 'image', 'description', 'price', 'time'];

    const ORDER = [
        'most' => 'most',
        'least' => 'least'
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function userCourse()
    {
        return $this->hasMany(CourseUser::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'course_tag');
    }

    public function getNumberUserAttribute()
    {
        $users = $this->user()->distinct()->get();
        return count($users);
    }

    public function getNumberLessonAttribute()
    {
        return $this->lesson()->count();
    }

    public function getTimeCourseAttribute()
    {
        $time = $this->lesson()->sum('time');
        $hours = floor($time / 60);
        $minutes = $time - $hours * 60;
        $time = ($hours > 0) ? ($hours. '(h)'. ' ' . $minutes.'(min)') : ($minutes. '(min)');
    
        return $time;
    }

    public function getTagsAttribute()
    {
        return $this->tag;
    }

    public function getTagCourseAttribute()
    {
        $tag = $this->tag;
        if (count($tag)) {
            $tagName = $tag->first()->name;
            for ($i = 1; $i < count($tag); $i++) {
                $tagName .= ", " . $tag[$i]->name;
            }
        } else {
            $tagName = "";
        }

        return $tagName;
    }

    public function getCourseUserAttribute()
    {
        return $this->userCourse()->distinct('user_id')->count();
    }

    public function getCheckUserAttribute()
    {
        $check = [];
        if (Auth::user()) {
            $check = $this->user()->wherePivot("user_id", Auth::user()->id)->get();
        }
        return count($check);
    }

    public function scopeNameCourse($query, $name)
    {
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%')
            ->orWhere('description', 'like', '%'  . $name. '%');
        }
        return $query;
    }

    public function scopeOrderCourse($query, $order)
    {
        if ($order == 0) {
            $query->orderBy('id', 'desc');
        }
        return $query;
    }

    // public function scopeTeacherFind($query, $teacherId)
    // {
    //     if ($teacherId) {
    //         $query->where('teacher_id', $teacherId);
    //     }
    //     return $query;
    // }

    public function scopeFindByTag($query, $tag)
    {
        if ($tag) {
            $query->join('course_tag', 'courses.id', '=', 'course_id')
            ->join('tags', 'tags.id', '=', 'course_tag.tag_id')
            ->where('tags.id', $tag)
            ->get(['courses.*']);
        }
        return $query;
    }

    public function scopeOrderByStudents($query, $students)
    {
        if ($students == Course::ORDER['most']) {
            $query->withCount('user')
                ->orderBy('user_count', 'desc');
        }

        if ($students == Course::ORDER['least']) {
            $query->withCount('user')
                ->orderBy('user_count');
        }
        return $query;
    }

    public function scopeOrderByLessosn($query, $lesson)
    {
        if ($lesson == Course::ORDER['most']) {
            $query->withCount('lesson')->orderBy('lessons_count', 'desc');
        }

        if ($lesson == Course::ORDER['least']) {
            $query->withCount('lesson')->orderBy('lessons_count');
        }
        return $query;
    }

    public function scopeOrderByReviews($query, $reviews)
    {
        if ($reviews == Course::ORDER['most']) {
            $query->withCount('review')->orderBy('review_count', 'desc');
        }

        if ($reviews == Course::ORDER['least']) {
            $query->withCount('review')->orderBy('review_count');
        }
        return $query;
    }

    public function scopeOrderByTimes($query, $time)
    {
        if ($time == Course::ORDER['most']) {
            $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderByDesc('time');
        }
        if ($time == Course::ORDER['least']) {
            $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderBy('time');
        }
        return $query;
    }
}
