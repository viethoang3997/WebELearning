<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tag extends Model
{
    public $timestamps = true;
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function getFormatCreatedAtAttribute()
    {
        $createdAt = Carbon::parse($this->created_at)->format('F j, Y \a\t g:i a');
        return $createdAt;
    }

    public function courseTag()
    {
        return $this->belongsToMany(Course::class, 'course_tag');
    }
}
