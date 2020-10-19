<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamResult extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_results';

    protected $fillable = ['result_name','result_slug','result_description','result_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeResult($request)
    {
    	$request->validate([
            'result_name'  => 'required|min:3|max:255|string',
            'result_slug'  => 'required|min:3|unique:exam_results,result_slug',
            'result_description'  => 'required|min:3',
            'result_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$results = new ExamResult(); 
        $results -> result_name = request('result_name');
        $results -> result_slug = request('result_slug');
        $results -> result_description = request('result_description');
        $results -> result_short_description = request('result_short_description');
        $results -> meta_name = request('meta_name');
        $results -> meta_description = request('meta_description');
        $results -> meta_keyword = request('meta_keyword');
        $results -> exams_id = request('exams_id');
        $results -> status = request('status');
        $results->save(); 
    }

    public static function editResult($request,$id)
    {
        $request->validate([
            'result_name'  => 'required|min:3|max:255|string',
            'result_slug'  => 'required|min:3',
            'result_description'  => 'required|min:3',
            'result_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $results =  ExamResult::find($id);
        $results -> result_name = request('result_name');
        $results -> result_slug = request('result_slug');
        $results -> result_description = request('result_description');
        $results -> result_short_description = request('result_short_description');
        $results -> meta_name = request('meta_name');
        $results -> meta_description = request('meta_description');
        $results -> meta_keyword = request('meta_keyword');
        $results -> exams_id = request('exams_id');
        $results -> status = request('status');
        $results->save(); 
    }
}
