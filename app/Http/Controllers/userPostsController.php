<?php

namespace App\Http\Controllers;

use App\categories;
use App\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class userPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= posts::count();
       $user= Auth::user();
       
       if(empty($posts)) { return view('admin/blank',compact('user'))->with('title','Posts Empty');} 
       else{return view('admin/posts');}
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts= posts::count();
        $user= Auth::user();
        $categories = categories::with('parent')->whereNull('parent_id')->get();
        $subcategories = categories::with('parent')->whereNotNull('parent_id')->get();
        if(empty($posts)) { 
            notify()->info('Great post! Write it down and post it :) !');
            return view('admin/blank',compact('user',))->with('title','Posts Empty');
        } 
        else{

          notify()->info('Great post! Write it down and post it :) !');
            return view('admin/postcreate',compact('user','categories','subcategories'))->with('title','Create New Post');}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user= Auth::user();
        var_dump($request->input());   
        // var_dump($user['email']);   
        $post = posts::create([
            'post_title' => $request['post_title'],
            'post_content' =>$request['post_content'],
            'post_status' =>$request['post_status'],
            'cat_title' =>$request['cat_title'],
            'post_author' =>$user['email'],

        ]);
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
        $posts= posts::count();
        $user= Auth::user();
        if(empty($posts)) {
            emotify('success', 'Hello You have successfully logged in to your account :) !');
            return view('admin/blank',compact('user'))->with('title','Posts Empty');} 
        else{
            emotify('success', 'Hello You have successfully logged in to your account :) !');
            return view('admin/postsedit');
        }
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
        $posts= posts::count();
        $user= Auth::user();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts= posts::count();
        $user= Auth::user();
        if(empty($posts)) {
            emotify('success', 'Hello You have successfully logged in to your account :) !');
             return view('admin/blank',compact('user'))->with('title','Posts Empty');} 
        else{
            $item=DB::table('posts')->where('id',$id)->delete();
            $items=DB::table('posts')->where('post_author',$user->email)->get();
            if($item)
            {
                emotify('success', 'Delete your post :) !');
                return view('admin/postlist',compact('items','user'));
            }
            }
            emotify('Error', ' your request Dot process :( !');
            return view('admin/postlist',compact('items','user'));
    }
    public function postlist(){
        $user= Auth::user();
        $posts=posts::count();
        $items=DB::table('posts')->where('post_author',$user->email)->get();
       
        if(empty($posts)){
            emotify('success', 'Sorry, you did not create any posts :( !');
            return view('admin/blank',compact('user'))->with('title','Posts Empty');}
        else{
            emotify('success', ' You can delete or edit your own posts :) !');
            return view('admin/postlist', compact('user','items'))->with('title', 'Post List');
        }
    }
    public function postedit($id){
        $user= Auth::user();
        $items=DB::table('posts')->where('id',$id)->get();
  foreach ($items as $item) {
    $item=$item;
    }
        return view('admin/postedit',compact('user','item'))->with('title','Post Edit');
    }
    
}
