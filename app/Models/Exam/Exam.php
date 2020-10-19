<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class Exam extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exams';

    protected $fillable = ['exam_name','exam_slug','category_id','exam_description','exam_short_description','meta_name','meta_description','meta_keyword','status'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function course()
    {
        return $this->hasMany('App\Models\Course\Course');
    }

    public static function storeExam($request)
    {
        $request->validate([
            'exam_name'  => 'required|min:3|max:255|string',
            'exam_slug'  => 'required|min:3|unique:exams,exam_slug',
            'category_id' => 'required|sometimes|nullable',
            'exam_description'  => 'required|min:3',
            'exam_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$exam = Exam::create(request()->all()); 
        $exam->save();
    }

    public static function editExam($request, $id)
    {
        $request->validate([
            'exam_name'  => 'required|min:3|max:255|string',
            'exam_slug'  => 'required|min:3',
            'category_id' => 'required|sometimes|nullable',
            'exam_description'  => 'required|min:3',
            'exam_short_description'  => 'required|min:3',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'status' => 'boolean',
        ]);
        $exam =  Exam::find($id);
        $exam -> exam_name = request('exam_name');
        $exam -> exam_slug = request('exam_slug');
        $exam -> category_id = request('category_id');
        $exam -> exam_description = request('exam_description');
        $exam -> exam_short_description = request('exam_short_description');
        $exam -> meta_name = request('meta_name');
        $exam -> meta_description = request('meta_description');
        $exam -> meta_keyword = request('meta_keyword');
        $exam -> status = request('status');
        $exam->save();
    }
}
