<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    public function show(){
        return view('auth.login');
    }

   public function login(){

    $credenciales=$this->validate(request(), [

        'email'=>'email|required|string',
        'password'=>'required|string',
   ]);

       if(Auth::attempt( $credenciales)){
        
        return redirect('/grupo');

       }else{
        return back()
        ->withErrors(['email'=>'Estas credenciales no Estan Registradas'])
        ->withInput(request(['email']));
       }
   }

   public function logout(){

    Auth::logout();
    return redirect('/');
   }
}
