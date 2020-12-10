<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Course;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $courses = $user->courseUser;
        $courseList = [];
        foreach ($courses as $course) {
            $courseImage = Course::findOrFail($course->course_id);
            $courseList [] = $courseImage;
        }
        return view('profile', compact('user', 'courseList'));
    }

    public function update(ProfileRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->back()->with('message', __('messages.success.update'));
    }

    public function uploadAvatar(ProfileRequest $request, $id)
    {
        $user = User::find($id);
        $image = $user->avatar;
        if ($request->hasFile('avatar')) {
            Storage::delete(config('variable.link').$image);
            $fileExtension = $request->file('avatar')->getClientOriginalExtension();
            $avatarName = $id . '.' . $fileExtension;
            $request->file('avatar')->storeAs(config('variable.link'), $avatarName);
        }
        $user->avatar = $avatarName;
        $user->save();
        return redirect()->back()->with('message', __('messages.success.update'));
    }
}
