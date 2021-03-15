<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\User;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $teachers = User::where('role_id', '2')->get();
        $tags = Tag::all();
        $courses = Course::orderBy('id', 'asc')->paginate(config('variable.paginate'));
        return view('courses.all_course', compact(['courses', 'teachers', 'tags']));
    }

    public function show($id)
    {
        $courses = Course::findOrFail($id);
        $otherCourses = Course::inRandomOrder()
            ->limit(config('variable.otherCourse'))->get();
        $lessons = $courses->lesson()->paginate(config('variable.paginateLesson'));
        return view('courses.detail_course', compact(['courses', 'lessons', 'otherCourses']));
    }

    // public function getSearch(Request $request)
    // {
    //     $search = $request->get('search');
    //     $courses = Course::where('name', 'like', '%' . $search . '%')
    //                             ->orWhere('description', 'like', '%'  . $search. '%')
    //                             ->paginate(2);
    //     return view('courses.all_course', compact('courses', 'search'));
    // }

    public function getSearch(Request $request)
    {
        $tags = Tag::all();
        $courses = Course::query()
            ->OrderByTimes($request->times)
            ->NameCourse($request->name_course)
            ->OrderByStudents($request->students)
            ->OrderByLessosn($request->lessons)
            ->OrderByReviews($request->reviews)
            ->OrderCourse($request->order_by_time)
            ->FindByTag($request->tags)
            ->paginate(8);
        return view('courses.all_course', compact('tags', 'courses'));
    }

    // public function searchByTag($id)
    // {
    //     $teachers = User::where('role_id', '2')->get();
    //     $tags = Tag::all();
    //     $courses = Course::query()->FindByTag($id)->paginate(config('variable.paginate'));
    //     return view('courses.all_course', compact('courses', 'teachers', 'tags'));
    // }

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
