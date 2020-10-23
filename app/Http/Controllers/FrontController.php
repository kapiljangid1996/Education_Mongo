<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course\Course;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::with('children')->with('exam')->with('course')->with('college')->whereNull('parent_id')->get();
        $courses = Course::where('status','=','1')->take(6)->get();
        return view('front.index')->with('categories',$categories)->with('courses',$courses);
    }

    public function courseList()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $courses = Course::where('status','=','1')->get();
        return view('front.course.list')->with('categories',$categories)->with('courses',$courses);
    }

    public function courseDetail($course_slug)
    {
        $categories = Category::with('children')->with('course')->whereNull('parent_id')->get();
        $courses = Course::where('course_slug',$course_slug)->get();
        return view('front.course.detail')->with('categories',$categories)->with('courses',$courses);
    }
}
