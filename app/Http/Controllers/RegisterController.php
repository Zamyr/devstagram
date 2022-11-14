<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request){
        
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, 
        [
            'name'=> 'required|max:20',
            'username'=> 'required|unique:users|min:3|max:20',
            'email'=> 'required|email|unique:users|max:60',
            'password'=> 'required|confirmed|min:6'
        ], 
        [
            'name.required' => 'Please enter your name',
            'name.max' => 'Name must not be more than 20 chars',
            'email.required' => 'Please enter your email',
            'email.email' => 'Email must be a valid email address',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=> Str::lower($request->username),
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
        ]);

        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);
        auth()-> attempt($request->only('email', 'password'));

        return redirect()->route('post.index', ['user' => auth()->user()->username]);
    }
}
