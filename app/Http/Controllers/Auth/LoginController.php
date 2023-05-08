<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //protecting route
    public function __construct()
    {
        $this->middleware(['guest']);
    }


    //
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        //dd($request->remember);
         //validation
         $this->validate($request,[
           
            'email' => 'required|email',
            'password'=>'required'
        ]);
        //dd('ok');
        if(!auth()->attempt($request->only('email','password'), $request->remember))
        {
            return back()->with('status','Invalid details');
        }
        return redirect()->route('dashboard');
        
    }

}
