<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Controller extends BaseController
{
    
    public function index(){
      if(Auth::check()){
        $user= Auth::user();
        
     return view('admin/index',compact('user'))->with('title','Dashoard');
      }
      else{
        echo "<b> No login </b><a href='auth'>please click here  for Login</a>";
       
      }
     
    }
    public function views(){
     echo "ok";
    }
    public function delete($id){
      $delete=DB::table('users')->where('id','=',$id)->delete();
      return view('admin/index',$delete)->with('success','Delete Success');
    }
}
