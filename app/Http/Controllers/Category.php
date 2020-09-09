<?php

namespace App\Http\Controllers;

use App\categories;
use App\category as AppCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class Category extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $category=DB::table('category')->where('user_id', $user->id)->get();
  
        $categories = categories::with('parent')->whereNull('parent_id')->get();
        $subcategories = categories::with('parent')->whereNotNull('parent_id')->get();
        
        return view('admin/category/categorycreate', compact('user', 'category', 'categories', 'subcategories'));
    
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=Auth::user();      
        $create_cat=categories::create([
            'cat_title'=>$request->input('cat_title'),
            'cat_slug'=>$request->input('cat_slug'),
            'cat_description'=>$request->input('cat_description'),
            'user_id'=>$user->id,
         ]);
         if($create_cat){
            emotify('success', 'Hello You have successfully logged in to your account :) !');
            return back();
   
         }
         emotify('Error', 'Sorry your category Dont Created ! ');
  
         return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
