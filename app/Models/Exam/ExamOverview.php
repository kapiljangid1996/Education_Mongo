<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamOverview extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_overviews';

    protected $fillable = ['overview_name','overview_slug','overview_description','overview_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeOverview($request)
    {
    	$request->validate([
            'overview_name'  => 'required|min:3|max:255|string',
            'overview_slug'  => 'required|min:3|unique:exam_overviews,overview_slug',
            'overview_description'  => 'required|min:3',
            'overview_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$overviews = new ExamOverview(); 
        $overviews -> overview_name = request('overview_name');
        $overviews -> overview_slug = request('overview_slug');
        $overviews -> overview_description = request('overview_description');
        $overviews -> overview_short_description = request('overview_short_description');
        $overviews -> meta_name = request('meta_name');
        $overviews -> meta_description = request('meta_description');
        $overviews -> meta_keyword = request('meta_keyword');
        $overviews -> exams_id = request('exams_id');
        $overviews -> status = request('status');
        $overviews->save(); 
    }

    public static function editOverview($request,$id)
    {
        $request->validate([
            'overview_name'  => 'required|min:3|max:255|string',
            'overview_slug'  => 'required|min:3',
            'overview_description'  => 'required|min:3',
            'overview_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $overviews =  ExamOverview::find($id);
        $overviews -> overview_name = request('overview_name');
        $overviews -> overview_slug = request('overview_slug');
        $overviews -> overview_description = request('overview_description');
        $overviews -> overview_short_description = request('overview_short_description');
        $overviews -> meta_name = request('meta_name');
        $overviews -> meta_description = request('meta_description');
        $overviews -> meta_keyword = request('meta_keyword');
        $overviews -> exams_id = request('exams_id');
        $overviews -> status = request('status');
        $overviews->save(); 
    }
}
