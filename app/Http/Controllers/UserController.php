<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\user as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     public function register(){
      
      return view('register');
    }

//sign up
  public function postSignUp(Request $request){

    $this->validate($request,[
      'FirstName' => 'required|max:120',
      'LastName' => 'required|max:120',
      'email' => 'required|email|unique:users',
      'password' => 'required|max:12|min:5|confirmed',
      'password_confirmation' => 'required|max:12|min:5'
    ]);

    $FirstName = $request['FirstName'];
    $LastName = $request['LastName'];
    $email = $request['email'];
    $password = bcrypt($request['password']);

    $user = new User();
    $user->FirstName = $FirstName;
    $user->LastName = $LastName;
    $user->email = $email;
    $user->password = $password;

    if( $user->save() ){
    $message ="Sign up Completed. Please Sign in";    
    }else{
      $message ="Somthing Went wrong.";
    }
   
   return redirect()->back()->with(['message'=> $message]); 

  }



  public function postSignIn(Request $request ){

    $this->validate($request,[
      'user_email' => 'required|email',
      'user_password' => 'required',
    ]);

    if(Auth::attempt(['email' => $request['user_email'], 'password'=> $request['user_password'] ])){
      return redirect()->route('home')->with(['message'=>'Login Complete']);
    }else{
      $alert ="Please Check your Username and Password";
    }
    return redirect()->back()->with(['alert'=>$alert]);
  }



  public function getLogout(){
    Auth::logout();
    $message ="Thank you..! Come Again.";
    return redirect()->route('home')->with(['message'=>$message]);
  }




}
