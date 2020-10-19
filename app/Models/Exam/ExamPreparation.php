<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamPreparation extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_preparations';

    protected $fillable = ['preparation_name','preparation_slug','preparation_description','preparation_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storePreparation($request)
    {
    	$request->validate([
            'preparation_name'  => 'required|min:3|max:255|string',
            'preparation_slug'  => 'required|min:3|unique:exam_preparations,preparation_slug',
            'preparation_description'  => 'required|min:3',
            'preparation_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$preparations = new ExamPreparation(); 
        $preparations -> preparation_name = request('preparation_name');
        $preparations -> preparation_slug = request('preparation_slug');
        $preparations -> preparation_description = request('preparation_description');
        $preparations -> preparation_short_description = request('preparation_short_description');
        $preparations -> meta_name = request('meta_name');
        $preparations -> meta_description = request('meta_description');
        $preparations -> meta_keyword = request('meta_keyword');
        $preparations -> exams_id = request('exams_id');
        $preparations -> status = request('status');
        $preparations->save(); 
    }

    public static function editPreparation($request,$id)
    {
        $request->validate([
            'preparation_name'  => 'required|min:3|max:255|string',
            'preparation_slug'  => 'required|min:3',
            'preparation_description'  => 'required|min:3',
            'preparation_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $preparations =  ExampreParation::find($id);
        $preparations -> preparation_name = request('preparation_name');
        $preparations -> preparation_slug = request('preparation_slug');
        $preparations -> preparation_description = request('preparation_description');
        $preparations -> preparation_short_description = request('preparation_short_description');
        $preparations -> meta_name = request('meta_name');
        $preparations -> meta_description = request('meta_description');
        $preparations -> meta_keyword = request('meta_keyword');
        $preparations -> exams_id = request('exams_id');
        $preparations -> status = request('status');
        $preparations->save(); 
    }
}
