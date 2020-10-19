<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $fillable = ['parent_id', 'cat_name','cat_slug'];

    public static $storeRules = [
    	'cat_name'  => 'required|min:3|max:255|string',
    	'cat_slug'  => 'required|unique:categories,cat_slug',
    	'parent_id' => 'sometimes|nullable'
    ];

    public static $updateRules = [
    	'cat_name'  => 'required|min:3|max:255|string',
    	'cat_slug'  => 'required',
    ];

    public function parent()
    {
    	return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany('App\Models\Category', 'parent_id')->with('children');
    }

    public function exam()
    {
        return $this->hasMany('App\Models\Exam\Exam');
    }

    public function course()
    {
        return $this->hasMany('App\Models\Course\Course');
    }

    public function college()
    {
        return $this->hasMany('App\Models\College\College');
    }
}
