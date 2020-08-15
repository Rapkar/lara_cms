<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
class userLoginController extends Controller
{

//register

    public function register(){
        if(!Auth::check()){
        return view('admin/register')->with('title','RegisterPage');
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
            return view('admin/login')->with('title','LoginPage');
    }

    public function doLogin(request $request){
       $login_data=$request->only('email','password');
       ($request->input('remember')) ? $remember=true :$remember=false; 
        if(Auth::attempt($login_data,$remember)){
        return redirect()->route('dashboard'); 
        }
        else
        {
             return back();
        }
    }
       //foreget_password
        public function forgetpassword(){
            return view('admin/forgetpaasowrd')->with('title','forget Password');
          }
       //foreget_password

       //recovery_password
       public function recoverypassword(){
        return view('admin/recoverypassword')->with('title','Recovery Password');
      }
      //recovery_password
        //log out
    
    public function logout(){
        
        if(Auth::logout());
        {
            return redirect()->route('auth_user');
        }
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $user_social = Socialite::driver('google')->stateless()->user();
        $user = User::whereEmail($user_social->getEmail())->first();
        if( ! $user)
        {
            $user = User::create([
                'name' => $user_social->getName(),
                'email' => $user_social->getEmail(),
                'password' => bcrypt($user_social->getId())

            ]);
        }
        auth()->loginUsingId($user->id);
        return redirect('/');

    }
}

