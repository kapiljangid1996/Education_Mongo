<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamCounselling extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_counsellings';

    protected $fillable = ['counselling_name','counselling_slug','counselling_description','counselling_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeCounselling($request)
    {
    	$request->validate([
            'counselling_name'  => 'required|min:3|max:255|string',
            'counselling_slug'  => 'required|min:3|unique:exam_counsellings,counselling_slug',
            'counselling_description'  => 'required|min:3',
            'counselling_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$counsellings = new ExamCounselling(); 
        $counsellings -> counselling_name = request('counselling_name');
        $counsellings -> counselling_slug = request('counselling_slug');
        $counsellings -> counselling_description = request('counselling_description');
        $counsellings -> counselling_short_description = request('counselling_short_description');
        $counsellings -> meta_name = request('meta_name');
        $counsellings -> meta_description = request('meta_description');
        $counsellings -> meta_keyword = request('meta_keyword');
        $counsellings -> exams_id = request('exams_id');
        $counsellings -> status = request('status');
        $counsellings->save(); 
    }

    public static function editCounselling($request,$id)
    {
        $request->validate([
            'counselling_name'  => 'required|min:3|max:255|string',
            'counselling_slug'  => 'required|min:3',
            'counselling_description'  => 'required|min:3',
            'counselling_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $counsellings =  ExamCounselling::find($id);
        $counsellings -> counselling_name = request('counselling_name');
        $counsellings -> counselling_slug = request('counselling_slug');
        $counsellings -> counselling_description = request('counselling_description');
        $counsellings -> counselling_short_description = request('counselling_short_description');
        $counsellings -> meta_name = request('meta_name');
        $counsellings -> meta_description = request('meta_description');
        $counsellings -> meta_keyword = request('meta_keyword');
        $counsellings -> exams_id = request('exams_id');
        $counsellings -> status = request('status');
        $counsellings->save(); 
    }
}
