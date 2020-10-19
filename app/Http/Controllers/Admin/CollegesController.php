<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\College\College;

class CollegesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$colleges = College::with('category')->paginate(10);
        return view('admin.college.index')->with('colleges',$colleges);
    }

    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.college.add')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $colleges = College::storeCollege($request);
        return redirect()->route('college.index')->with('success','College Created!');
    }

    public function edit($id)
    {
        $colleges = College::with('category')->find($id);
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.college.edit')->with('categories',$categories)->with('colleges',$colleges);
    }

    public function update(Request $request, $id)
    {   
        $colleges = College::editCollege($request,$id);
        return redirect()->route('college.index')->with('success','Course Updated!');
    }
}
