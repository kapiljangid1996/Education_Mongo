<?php

namespace App\Models\College;

use Jenssegers\Mongodb\Eloquent\Model;

class College extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'colleges';

    protected $fillable = ['college_name','college_slug','category_id','ownership','state','city','street','post_code','contact','email','website','college_description','college_short_description','college_image','college_logo','meta_name','meta_description','meta_keyword','status'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public static function storeCollege($request)
    {
    	$request->validate([
            'college_name'  => 'required|min:3|max:255|string',
            'college_slug'  => 'required|unique:colleges,college_slug',
            'category_id' => 'required|sometimes|nullable',
            'ownership' => 'required|sometimes|nullable',
            'state'  => 'required|sometimes|nullable',
            'city'  => 'required|sometimes|nullable',
            'street'  => 'required|min:3',
            'post_code'  => 'required|numeric',
            'contact'  => 'required|numeric',
            'email'  => 'required|email|string',
            'website'  => 'required|string',
            'college_description'  => 'required|min:3',
            'college_short_description'  => 'required|min:3',
            'college_image'  => 'required',
            'college_logo'  => 'required',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $colleges = new College(); 
        $colleges -> college_name = request('college_name');
        $colleges -> college_slug = request('college_slug');
        $colleges -> category_id = request('category_id');
        $colleges -> ownership = request('ownership');
        $colleges -> state = request('state');
        $colleges -> city = request('city');
        $colleges -> street = request('street');
        $colleges -> post_code = request('post_code');
        $colleges -> contact = request('contact');
        $colleges -> email = request('email');
        $colleges -> website = request('website');
        $colleges -> college_description = request('college_description');
        $colleges -> college_short_description = request('college_short_description');
        $colleges -> meta_name = request('meta_name');
        $colleges -> meta_description = request('meta_description');
        $colleges -> meta_keyword = request('meta_keyword');
        $colleges -> status = request('status');
        if (request()->hasfile('college_image'))
        {
            $imageName =$request->get('college_slug')."-".request()->college_image->getClientOriginalName();
            request()->college_image->move(public_path('Uploads/College/Image'), $imageName); 
            $colleges->college_image = $imageName;
        }
        if (request()->hasfile('college_logo'))
        {
            $logoName =$request->get('college_slug')."-".request()->college_logo->getClientOriginalName();
            request()->college_logo->move(public_path('Uploads/College/Logo'), $logoName); 
            $colleges->college_logo = $logoName;
        }
        $colleges->save();
    }

    public static function editCollege($request,$id)
    {
        $request->validate([
            'college_name'  => 'required|min:3|max:255|string',
            'college_slug'  => 'required',
            'category_id' => 'required|sometimes|nullable',
            'ownership' => 'required|sometimes|nullable',
            'state'  => 'required|sometimes|nullable',
            'city'  => 'required|sometimes|nullable',
            'street'  => 'required|min:3',
            'post_code'  => 'required|numeric',
            'contact'  => 'required|numeric',
            'email'  => 'required|email|string',
            'website'  => 'required|string',
            'college_description'  => 'required|min:3',
            'college_short_description'  => 'required|min:3',
            'meta_name'  => 'required|min:3|max:255|string',
            'meta_description'  => 'required|min:3',
            'meta_keyword'  => 'required|min:3',
            'status' => 'boolean',
        ]);
        $colleges = College::find($id);
        $colleges -> college_name = $request->input('college_name');
        $colleges -> college_slug = $request->input('college_slug');
        $colleges -> category_id = $request->input('category_id');
        $colleges -> ownership = $request->input('ownership');
        $colleges -> state = $request->input('state');
        $colleges -> city = $request->input('city');
        $colleges -> street = $request->input('street');
        $colleges -> post_code = $request->input('post_code');
        $colleges -> contact = $request->input('contact');
        $colleges -> email = $request->input('email');
        $colleges -> website = $request->input('website');
        $colleges -> college_description = $request->input('college_description');
        $colleges -> college_short_description = $request->input('college_short_description');
        $colleges -> meta_name = $request->input('meta_name');
        $colleges -> meta_description = $request->input('meta_description');
        $colleges -> meta_keyword = $request->input('meta_keyword');
        $colleges -> status = $request->input('status');
        $old_college_image = $request->input('old_college_image');
        $old_college_logo = $request->input('old_college_logo');
        if ($request->hasfile('college_image'))
        {
            if(!empty($old_college_image))
            {
                unlink(public_path("Uploads/College/Image/{$old_college_image}"));
            }
            $slug = $request->get('college_slug');
            $imageName =$slug.'-'.request()->college_image->getClientOriginalName();
            request()->college_image->move(public_path('Uploads/College/Image'), $imageName); 
            $colleges->college_image = $imageName;
        }
        if ($request->hasfile('college_logo'))
        {
            if(!empty($old_college_logo))
            {
                unlink(public_path("Uploads/College/Logo/{$old_college_logo}"));
            }
            $slug = $request->get('college_slug');
            $logoName =$slug."-".request()->college_logo->getClientOriginalName();
            request()->college_logo->move(public_path('Uploads/College/Logo'), $logoName); 
            $colleges->college_logo = $logoName;
        }
        $colleges->save();
    }
}
