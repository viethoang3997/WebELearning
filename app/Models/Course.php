<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Lesson;
use App\Models\Review;
use App\Models\CourseTag;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    public $timestamps = false;
    protected $table = 'courses';
    protected $fillable = ['name', 'image', 'description', 'price', 'time'];

    const ORDER = [
        'most' => 1,
        'least' => 2,
    ];

    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function getCountUserAttribute()
    {
        return $this->user()->count();
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

    public function courseTag()
    {
        return $this->hasMany(CourseTag::class);
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

    public function scopeSearchFilter($query, $request)
    {
        $querry = null;

        if ($request->has('name_course')) {
            $querry = $query->where('name', 'like', '%' . $request->name_course . '%')
            ->orWhere('description', 'like', '%'  . $request->name_course . '%');
        }

        if ($request->has('order_by_newest') == 0) {
            $querry = $query->orderByDesc('id');
        }

        if ($request->has('order_by_oldest') == 0) {
            $querry = $query->orderBy('id');
        }

        if ($request->has('tags') != 0) {
            $querry = $query->with('courseTag')->whereHas('courseTag', function ($q) use ($request) {
                $q->join('tags', 'tags.id', '=', 'course_tag.tag_id')
                ->where('tags.id', $request->tags);
            })
            ->get();
        }

        if ($request->has('students')) {
            if ($request->students == Course::ORDER['most']) {
                $querry = $query->withCount('user')->orderByDesc('user_count');
            }

            if ($request->students == Course::ORDER['least']) {
                $querry = $query->withCount('user')->orderBy('user_count');
            }
        }

        if ($request->has('lessons')) {
            if ($request->lessons == Course::ORDER['most']) {
                $querry = $query->withCount('lesson')->orderByDesc('lesson_count');
            }

            if ($request->lessons == Course::ORDER['least']) {
                $querry = $query->withCount('lesson')->orderBy('lesson_count');
            }
        }

        if ($request->has('reviews')) {
            if ($request->reviews == Course::ORDER['most']) {
                $querry = $query->withCount('review')->orderByDesc('review_count');
            }

            if ($request->reviews == Course::ORDER['least']) {
                $querry = $query->withCount('review')->orderBy('review_count');
            }
        }

        if ($request->has('times')) {
            if ($request->times == Course::ORDER['most']) {
                $querry = $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderByDesc('time');
            }

            if ($request->times == Course::ORDER['least']) {
                $querry = $query->addSelect(['time' => Lesson::selectRaw('sum(time) as total')
                    ->whereColumn('course_id', 'courses.id')
                    ->groupBy('course_id')
                ])->orderBy('time');
            }
        }

        return $querry;
    }

}
