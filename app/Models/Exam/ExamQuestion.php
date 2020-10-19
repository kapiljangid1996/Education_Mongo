<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_questions';

    protected $fillable = ['question_name','question_slug','question_description','question_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeQuestion($request)
    {
    	$request->validate([
            'question_name'  => 'required|min:3|max:255|string',
            'question_slug'  => 'required|min:3|unique:exam_questions,question_slug',
            'question_description'  => 'required|min:3',
            'question_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$questions = new ExamQuestion(); 
        $questions -> question_name = request('question_name');
        $questions -> question_slug = request('question_slug');
        $questions -> question_description = request('question_description');
        $questions -> question_short_description = request('question_short_description');
        $questions -> meta_name = request('meta_name');
        $questions -> meta_description = request('meta_description');
        $questions -> meta_keyword = request('meta_keyword');
        $questions -> exams_id = request('exams_id');
        $questions -> status = request('status');
        $questions->save(); 
    }

    public static function editQuestion($request,$id)
    {
        $request->validate([
            'question_name'  => 'required|min:3|max:255|string',
            'question_slug'  => 'required|min:3',
            'question_description'  => 'required|min:3',
            'question_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $questions =  ExamQuestion::find($id);
        $questions -> question_name = request('question_name');
        $questions -> question_slug = request('question_slug');
        $questions -> question_description = request('question_description');
        $questions -> question_short_description = request('question_short_description');
        $questions -> meta_name = request('meta_name');
        $questions -> meta_description = request('meta_description');
        $questions -> meta_keyword = request('meta_keyword');
        $questions -> exams_id = request('exams_id');
        $questions -> status = request('status');
        $questions->save(); 
    }
}
