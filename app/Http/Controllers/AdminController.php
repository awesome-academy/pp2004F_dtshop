<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        //return view('admin.home');
    }

    public function login()
    {
       // return view('auth.login');
    }
    
    public function post_login(Request $request)
    {
        // $remember=$request->has('remember_me')? true : false;
        // if (auth()->attempt(
        //     [
        //     'email'=>$request->email,
        //     'password'=>$request->password],
        //     $remember
        // )) {
        //     return redirect()->to('admin.home');
        // }
    }
}
