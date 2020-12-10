<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CourseRequest;

class CourseAdminController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(config('variable.paginate'));
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function uploadImage($images)
    {
        $image = uniqid(). "_" .$images->getClientOriginalName();
        $images->storeAs(config('variable.link'), $image);
        return $image;
    }

    public function store(CourseRequest $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file('image'));
        }
        Course::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('admin/courses')->with('message', __('messages.success.add'));
    }
        
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $courses = Course::findOrFail($id);
        return view('admin.courses.edit', compact('courses'));
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->all();
        $courses = Course::find($id);
        if ($request->hasFile('image')) {
            $images = $courses->image;
            Storage::disk('public')->delete('/image/'.$images);
            $image = $this->uploadImage($request->file('image'));
            $data['image'] = $image;
        }
        $courses->update($data);
        return redirect('admin/courses')->with('message', __('messages.success.edit'));
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect('admin/courses');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $courses = Course::where('name', 'like', '%' . $search . '%')->paginate(config('variable.paginateLesson'));
        return view('admin.courses.index', compact(['search', 'courses']));
    }
}
