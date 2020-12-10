<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\CourseUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courseId = $lesson->course->id;
        $userIds = CourseUser::where('lesson_id', $id)->pluck('user_id')->toArray();
        $teachers = User::where('role_id', User::ROLE_TEACHER)->whereIn('id', $userIds)->get();
        $lessonReviews = $lesson->review()->get();
        $rating = [
            'five_star' => config('variable.fiveStar'),
            'four_star' => config('variable.fourStar'),
            'three_star' => config('variable.threeStar'),
            'two_star' => config('variable.twoStar'),
            'one_star' => config('variable.oneStar')
        ];
        $otherCourses = Course::latest()->limit(config('variable.otherCourse'))->get();
        return view('courses.detail_lesson', compact(['lesson', 'otherCourses', 'lessonReviews', 'teachers',
        'courseId', 'rating']));
    }

    public function getSearchLesson(Request $request, $id)
    {
        $courses = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()->limit(config('variable.otherCourse'))->get();
        $lessons = Lesson::query()->where([
            ['course_id', '=', $id],
            ['name', 'LIKE', "%" . $request->get('search') . "%"],
        ])->paginate(2);
        return view('courses.detail_course', compact(['courses', 'lessons', 'otherCourses']));
    }

    public function joinLesson(Request $request, $id)
    {
        $this->saveCourseUser($id, $request);
        return redirect()->route('lesson.show', $id);
    }

    public function saveCourseUser($id, $request)
    {
        CourseUser::updateOrCreate([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'lesson_id' => $id
        ], [
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'lesson_id' => $id
        ]);
    }
}
