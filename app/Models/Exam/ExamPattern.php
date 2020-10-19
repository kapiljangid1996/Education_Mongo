<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamPattern extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_patterns';

    protected $fillable = ['pattern_name','pattern_slug','pattern_description','pattern_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storePattern($request)
    {
    	$request->validate([
            'pattern_name'  => 'required|min:3|max:255|string',
            'pattern_slug'  => 'required|min:3|unique:exam_patterns,pattern_slug',
            'pattern_description'  => 'required|min:3',
            'pattern_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$patterns = new ExamPattern(); 
        $patterns -> pattern_name = request('pattern_name');
        $patterns -> pattern_slug = request('pattern_slug');
        $patterns -> pattern_description = request('pattern_description');
        $patterns -> pattern_short_description = request('pattern_short_description');
        $patterns -> meta_name = request('meta_name');
        $patterns -> meta_description = request('meta_description');
        $patterns -> meta_keyword = request('meta_keyword');
        $patterns -> exams_id = request('exams_id');
        $patterns -> status = request('status');
        $patterns->save(); 
    }

    public static function editPattern($request,$id)
    {
        $request->validate([
            'pattern_name'  => 'required|min:3|max:255|string',
            'pattern_slug'  => 'required|min:3',
            'pattern_description'  => 'required|min:3',
            'pattern_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $patterns =  ExamPattern::find($id);
        $patterns -> pattern_name = request('pattern_name');
        $patterns -> pattern_slug = request('pattern_slug');
        $patterns -> pattern_description = request('pattern_description');
        $patterns -> pattern_short_description = request('pattern_short_description');
        $patterns -> meta_name = request('meta_name');
        $patterns -> meta_description = request('meta_description');
        $patterns -> meta_keyword = request('meta_keyword');
        $patterns -> exams_id = request('exams_id');
        $patterns -> status = request('status');
        $patterns->save(); 
    }
}
