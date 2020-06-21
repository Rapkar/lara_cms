<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class userLoginController extends Controller
{

//register

    public function register(){
        if(!Auth::check()){
        return view('admin/register');
    }
    return redirect()->route('dashboard');
  
      }
      public function registerform(request $request){
       
       
            
            $register_data=array(
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> Hash::make($request->input('password'))
        );
        
            $update= DB::table('users')->insert($register_data);
            var_dump($update);
            if(!$update){
                return back();
            }
            return redirect()->route('auth_user');
      }

//Login User

    public function auth_user(){
            return view('admin/login');
    }

    public function doLogin(request $request){
       $login_data=$request->only('email','password');
       ($request->input('remember')) ? $remember=true :$remember=false; 
        var_dump($remember);
        if(Auth::attempt($login_data)){
        return redirect()->route('dashboard'); 
        }
        else
        {
             return back();
        }
    }
//log out
    public function logout(){
        
        if(Auth::logout());
        {
            return redirect()->route('auth_user');
        }
    }
}
