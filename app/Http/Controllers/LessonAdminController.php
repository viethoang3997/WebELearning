<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;

class LessonAdminController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('courseId');
        $courses = Course::findOrFail($id);
        $courseName = $courses->name;
        $lessonCourse = Lesson::where([
            ['course_id', '=', $id],
            ['name', 'LIKE', "%" . $request->name . "%"],
        ])->paginate(config('variable.paginate'));

        $data = [
            'lessons' => $lessonCourse,
            'courseName' => $courseName,
            'courseId' => $id
        ];
        return view('admin.lessons.index', $data);
    }

    public function create(Request $request)
    {
        $id = $request->query('courseId');
        return view('admin.lessons.create', compact('id'));
    }

    public function store(LessonRequest $request)
    {
        lesson::create([
            'name' => $request->name,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'time' => $request->time,
            'course_id' => $request->id,
        ]);
        return redirect()->route('admin.lessons.index', ['courseId' => $request->id])->with('message', __('messages.success.add'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $lessonId)
    {
        $courseId = $request->query('courseId');
        $lessons = Lesson::findOrFail($lessonId);
        return view('admin.lessons.edit', compact('lessons', 'courseId', 'lessonId'));
    }

    public function update(LessonRequest $request, $lessonId)
    {
        $data = $request->all();
        $courseId = $request->query('courseId');
        Lesson::find($lessonId)->update($data);
        return redirect()->route('admin.lessons.index', ['courseId' => $courseId])->with('message', __('messages.success.edit'));
    }

    public function destroy(Request $request, $lessonId)
    {
        $courseId = $request->query('courseId');
        Lesson::findOrFail($lessonId)->delete();
        return redirect()->route('admin.lessons.index', ['courseId' => $courseId]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $lessons = Lesson::where('name', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%'  . $search. '%')
                ->paginate(config('variable.paginateLesson'));
        return view('admin.lessons.index', compact(['search', 'lessons']));
    }
}
