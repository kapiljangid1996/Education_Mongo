<?php

namespace App\Models\Exam;

use Jenssegers\Mongodb\Eloquent\Model;

class ExamSyllabus extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'exam_syllabi';

    protected $fillable = ['syllabus_name','syllabus_slug','syllabus_description','syllabus_short_description','meta_name','meta_description','meta_keyword','sort_order','status'];

    public static function storeSyllabus($request)
    {
    	$request->validate([
            'syllabus_name'  => 'required|min:3|max:255|string',
            'syllabus_slug'  => 'required|min:3|unique:exam_syllabi,syllabus_slug',
            'syllabus_description'  => 'required|min:3',
            'syllabus_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
    	$syllabi = new ExamSyllabus(); 
        $syllabi -> syllabus_name = request('syllabus_name');
        $syllabi -> syllabus_slug = request('syllabus_slug');
        $syllabi -> syllabus_description = request('syllabus_description');
        $syllabi -> syllabus_short_description = request('syllabus_short_description');
        $syllabi -> meta_name = request('meta_name');
        $syllabi -> meta_description = request('meta_description');
        $syllabi -> meta_keyword = request('meta_keyword');
        $syllabi -> exams_id = request('exams_id');
        $syllabi -> status = request('status');
        $syllabi->save(); 
    }

    public static function editSyllabus($request,$id)
    {
        $request->validate([
            'syllabus_name'  => 'required|min:3|max:255|string',
            'syllabus_slug'  => 'required|min:3',
            'syllabus_description'  => 'required|min:3',
            'syllabus_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $syllabi =  ExamSyllabus::find($id);
        $syllabi -> syllabus_name = request('syllabus_name');
        $syllabi -> syllabus_slug = request('syllabus_slug');
        $syllabi -> syllabus_description = request('syllabus_description');
        $syllabi -> syllabus_short_description = request('syllabus_short_description');
        $syllabi -> meta_name = request('meta_name');
        $syllabi -> meta_description = request('meta_description');
        $syllabi -> meta_keyword = request('meta_keyword');
        $syllabi -> exams_id = request('exams_id');
        $syllabi -> status = request('status');
        $syllabi->save(); 
    }
}
