<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamCutOff extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_cutoffs';

    protected $fillable = ['cutoff_name','cutoff_slug','cutoff_description','cutoff_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeCutoff($request)
    {
    	$request->validate([
            'cutoff_name'  => 'required|min:3|max:255|string',
            'cutoff_slug'  => 'required|min:3|unique:exam_cutoffs,cutoff_slug',
            'cutoff_description'  => 'required|min:3',
            'cutoff_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$cutoffs = new ExamCutOff(); 
        $cutoffs -> cutoff_name = request('cutoff_name');
        $cutoffs -> cutoff_slug = request('cutoff_slug');
        $cutoffs -> cutoff_description = request('cutoff_description');
        $cutoffs -> cutoff_short_description = request('cutoff_short_description');
        $cutoffs -> meta_name = request('meta_name');
        $cutoffs -> meta_description = request('meta_description');
        $cutoffs -> meta_keyword = request('meta_keyword');
        $cutoffs -> exams_id = request('exams_id');
        $cutoffs -> status = request('status');
        $cutoffs->save(); 
    }

    public static function editCutoff($request,$id)
    {
        $request->validate([
            'cutoff_name'  => 'required|min:3|max:255|string',
            'cutoff_slug'  => 'required|min:3',
            'cutoff_description'  => 'required|min:3',
            'cutoff_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $cutoffs =  ExamCutOff::find($id);
        $cutoffs -> cutoff_name = request('cutoff_name');
        $cutoffs -> cutoff_slug = request('cutoff_slug');
        $cutoffs -> cutoff_description = request('cutoff_description');
        $cutoffs -> cutoff_short_description = request('cutoff_short_description');
        $cutoffs -> meta_name = request('meta_name');
        $cutoffs -> meta_description = request('meta_description');
        $cutoffs -> meta_keyword = request('meta_keyword');
        $cutoffs -> exams_id = request('exams_id');
        $cutoffs -> status = request('status');
        $cutoffs->save(); 
    }
}
