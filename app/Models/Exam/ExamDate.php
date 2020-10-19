<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamDate extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_dates';

    protected $fillable = ['date_name','date_slug','date_description','date_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeDate($request)
    {
    	$request->validate([
            'date_name'  => 'required|min:3|max:255|string',
            'date_slug'  => 'required|min:3|unique:exam_dates,date_slug',
            'date_description'  => 'required|min:3',
            'date_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$date = new ExamDate(); 
        $date -> date_name = request('date_name');
        $date -> date_slug = request('date_slug');
        $date -> date_description = request('date_description');
        $date -> date_short_description = request('date_short_description');
        $date -> meta_name = request('meta_name');
        $date -> meta_description = request('meta_description');
        $date -> meta_keyword = request('meta_keyword');
        $date -> exams_id = request('exams_id');
        $date -> status = request('status');
        $date->save(); 
    }

    public static function editDate($request,$id)
    {
        $request->validate([
            'date_name'  => 'required|min:3|max:255|string',
            'date_slug'  => 'required|min:3',
            'date_description'  => 'required|min:3',
            'date_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $dates =  ExamDate::find($id);
        $dates -> date_name = request('date_name');
        $dates -> date_slug = request('date_slug');
        $dates -> date_description = request('date_description');
        $dates -> date_short_description = request('date_short_description');
        $dates -> meta_name = request('meta_name');
        $dates -> meta_description = request('meta_description');
        $dates -> meta_keyword = request('meta_keyword');
        $dates -> exams_id = request('exams_id');
        $dates -> status = request('status');
        $dates->save(); 
    }
}
