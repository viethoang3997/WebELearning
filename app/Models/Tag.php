<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_tag');
    }
}
