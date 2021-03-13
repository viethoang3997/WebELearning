<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class CourseTag extends Model
{
    public $timestamps = false;
    protected $table = 'course_tag';
    protected $fillable = ['course_id', 'tag_id'];

}
