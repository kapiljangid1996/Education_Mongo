<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course\Course;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
}
