<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::limit(6)->orderBy('id', 'desc')->get();
        return view('index', compact('courses'));
    }
}
