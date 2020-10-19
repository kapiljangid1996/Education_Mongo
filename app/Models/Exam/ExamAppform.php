<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamAppform extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_appforms';

    protected $fillable = ['appform_name','appform_slug','appform_description','appform_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeAppform($request)
    {
    	$request->validate([
            'appform_name'  => 'required|min:3|max:255|string',
            'appform_slug'  => 'required|min:3|unique:exam_appforms,appform_slug',
            'appform_description'  => 'required|min:3',
            'appform_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$appforms = new ExamAppform(); 
        $appforms -> appform_name = request('appform_name');
        $appforms -> appform_slug = request('appform_slug');
        $appforms -> appform_description = request('appform_description');
        $appforms -> appform_short_description = request('appform_short_description');
        $appforms -> meta_name = request('meta_name');
        $appforms -> meta_description = request('meta_description');
        $appforms -> meta_keyword = request('meta_keyword');
        $appforms -> exams_id = request('exams_id');
        $appforms -> status = request('status');
        $appforms->save(); 
    }

    public static function editAppform($request,$id)
    {
        $request->validate([
            'appform_name'  => 'required|min:3|max:255|string',
            'appform_slug'  => 'required|min:3',
            'appform_description'  => 'required|min:3',
            'appform_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $appforms =  ExamAppform::find($id);
        $appforms -> appform_name = request('appform_name');
        $appforms -> appform_slug = request('appform_slug');
        $appforms -> appform_description = request('appform_description');
        $appforms -> appform_short_description = request('appform_short_description');
        $appforms -> meta_name = request('meta_name');
        $appforms -> meta_description = request('meta_description');
        $appforms -> meta_keyword = request('meta_keyword');
        $appforms -> exams_id = request('exams_id');
        $appforms -> status = request('status');
        $appforms->save(); 
    }
}
