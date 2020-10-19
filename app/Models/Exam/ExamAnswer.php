<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_answers';

    protected $fillable = ['answer_name','answer_slug','answer_description','answer_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeAnswer($request)
    {
    	$request->validate([
            'answer_name'  => 'required|min:3|max:255|string',
            'answer_slug'  => 'required|min:3|unique:exam_answers,answer_slug',
            'answer_description'  => 'required|min:3',
            'answer_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$answers = new ExamAnswer(); 
        $answers -> answer_name = request('answer_name');
        $answers -> answer_slug = request('answer_slug');
        $answers -> answer_description = request('answer_description');
        $answers -> answer_short_description = request('answer_short_description');
        $answers -> meta_name = request('meta_name');
        $answers -> meta_description = request('meta_description');
        $answers -> meta_keyword = request('meta_keyword');
        $answers -> exams_id = request('exams_id');
        $answers -> status = request('status');
        $answers->save(); 
    }

    public static function editAnswer($request,$id)
    {
        $request->validate([
            'answer_name'  => 'required|min:3|max:255|string',
            'answer_slug'  => 'required|min:3',
            'answer_description'  => 'required|min:3',
            'answer_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $answers =  ExamAnswer::find($id);
        $answers -> answer_name = request('answer_name');
        $answers -> answer_slug = request('answer_slug');
        $answers -> answer_description = request('answer_description');
        $answers -> answer_short_description = request('answer_short_description');
        $answers -> meta_name = request('meta_name');
        $answers -> meta_description = request('meta_description');
        $answers -> meta_keyword = request('meta_keyword');
        $answers -> exams_id = request('exams_id');
        $answers -> status = request('status');
        $answers->save(); 
    }
}
