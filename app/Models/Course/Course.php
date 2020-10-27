<?php

namespace App\Models\Course;

use Jenssegers\Mongodb\Eloquent\Model;

class Course extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'courses';

    protected $fillable = ['course_name','course_slug','category_id','exam_id','course_description','course_short_description','course_image','meta_name','meta_description','meta_keyword','status'];

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam\Exam');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public static function storeCourse($request)
    {
    	$request->validate([
            'course_name'  => 'required|max:255|string',
            'course_slug'  => 'required|unique:courses,course_slug',
            'category_id' => 'required|sometimes|nullable',
            'exam_id' => 'required|sometimes|nullable',
            'course_description'  => 'required|min:3',
            'course_short_description'  => 'required|min:3',
            'course_image'  => 'required',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $courses = new Course(); 
        $courses -> course_name = request('course_name');
        $courses -> course_slug = request('course_slug');
        $courses -> category_id = request('category_id');
        $courses -> exam_id = json_encode(request('exam_id'));
        $courses -> course_description = request('course_description');
        $courses -> course_short_description = request('course_short_description');
        $courses -> meta_name = request('meta_name');
        $courses -> meta_description = request('meta_description');
        $courses -> meta_keyword = request('meta_keyword');
        $courses -> status = request('status');
        if (request()->hasfile('course_image'))
        {
            $imageName =$request->get('course_slug')."-".request()->course_image->getClientOriginalName();
            request()->course_image->move(public_path('Uploads/Course'), $imageName); 
            $courses->course_image = $imageName;
        }
        $courses->save();
    }

    public static function editCourse($request,$id)
    {
    	$request->validate([
            'course_name'  => 'required|max:255|string',
            'course_slug'  => 'required',
            'category_id' => 'required|sometimes|nullable',
            'exam_id' => 'required|sometimes|nullable',
            'course_description'  => 'required|min:3',
            'course_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $courses = Course::find($id);
        $courses -> course_name = $request->input('course_name');
        $courses -> course_slug = $request->input('course_slug');
        $courses -> category_id = $request->input('category_id');
        $courses -> exam_id = json_encode($request->input('exam_id'));
        $courses -> course_description = $request->input('course_description');
        $courses -> course_short_description = $request->input('course_short_description');
        $courses -> meta_name = $request->input('meta_name');
        $courses -> meta_description = $request->input('meta_description');
        $courses -> meta_keyword = $request->input('meta_keyword');
        $courses -> status = $request->input('status');
        $old_image = $request->input('old_course_image');
        if ($request->hasfile('course_image'))
        {
            if(!empty($old_image))
            {
                unlink(public_path("Uploads/Course/{$old_image}"));
            }
            $slug = $request->get('course_slug');
            $imageName =$slug.'-'.request()->course_image->getClientOriginalName();
            request()->course_image->move(public_path('Uploads/Course'), $imageName); 
            $courses->course_image = $imageName;
        }
        $courses->save();
    }
}
