<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    public $timestamps = false;
    protected $table = 'course_user';
    protected $fillable = ['user_id', 'course_id', 'lesson_id'];
}
