<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$categories = Category::with('children')->paginate(10);
    	return view('admin.category.index')->with('categories',$categories);
    }

    public function store(Request $request)
    {
    	Category::create($request->validate(Category::$storeRules));
   		return redirect()->route('category.index')->with('success','Category Created!');
    }

    public function update(Request $request, Category $category)
    {
    	$category->update($request->validate(Category::$updateRules));
    	return redirect()->route('category.index')->with('success','Category Updated!');
    }

    public function destroy(Category $category)
    {
    	if ($category->children) 
    	{
       		$category->children()->delete();
    	}
    	$category->delete();
    	return redirect()->route('category.index')->with('success','Category Deleted!');
    }

    public function export($type)
    {
    	return Excel::download(new CategoryExport, 'categories.' . $type);
    }
}
