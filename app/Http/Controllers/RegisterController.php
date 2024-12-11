<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }


    public function register(RegisterRequest $request){
        // dd($request);
        if($request->validated()){
            if($request->attemptRegister()){
                return to_route('dashboard');
            }
            return back();
        }
    }
}
