<?php

namespace App\Http\Controllers;

use App\Models\prodcut;
use http\Client\Curl\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManger extends Controller
{
    function login(){
        return view('login');
    }
    function registration(){
       return view('registration');
    }
    function post(){
        return view('post');
    }
    function loginPost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=>'required'
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))->with("success","welcome on board");
        }
        return redirect()->intended(route('login'))->with("error","login details are not valid");
    }


    function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required |email |unique:users',
            'password' => 'required'
        ]);
        $user = new \App\Models\User();
        $user ->name = $request->name;
        $user ->email = $request->email;
        $user ->password = $request->password;
        $res=$user->save();
        if(!$res){
            return redirect(route('registration'))->with("error","registration not valid");
        }
        return redirect(route('login'))->with("success","welcome");
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    function postPost(Request $request){
        $request->validate([
            'text' => 'required',
            'description' =>'required'
        ]);
        $quote = new prodcut();
        $quote ->text = $request->text;
        $quote ->description = $request->description;
        $res=$quote->save();
        if($res){
            return redirect(route('post'))->with("success","welcome");
        }
        return redirect(route('login'))->with("error","registration not valid");
    }
}
