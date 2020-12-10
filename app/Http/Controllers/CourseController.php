<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('courses.all_course', compact('courses'));
    }

    public function show($id)
    {
        $courses = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()
            ->limit(config('variable.otherCourse'))->get();
        $lessons = $courses->lesson()->paginate(config('variable.paginateLesson'));
        return view('courses.detail_course', compact(['courses', 'lessons', 'otherCourses']));
    }

    public function getSearch(Request $request)
    {
        $search = $request->get('search');
        $courses = Course::where('name', 'like', '%' . $search . '%')
                                ->orWhere('description', 'like', '%'  . $search. '%')
                                ->paginate(2);
        return view('courses.all_course', compact('courses', 'search'));
    }

    public function joinCourse($id)
    {
        $courses = Course::find($id);
        $courses->user()->attach(Auth::user()->id);
        return redirect()->route('course.show', $id);
    }

    public function leaveCourse($id)
    {
        $courses = Course::find($id);
        $courses->user()->detach(Auth::user()->id);
        return redirect()->route('course.show', $id);
    }
}
