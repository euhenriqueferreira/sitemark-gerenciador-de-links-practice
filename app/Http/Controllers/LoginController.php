<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function login(LoginRequest $request){
        if($request->validated()){
            if($request->attemptLogin()){
                return to_route('dashboard');
            }
            return back()->with('message', 'Something go wrong!');
        }
        
        return back();
    }
}
