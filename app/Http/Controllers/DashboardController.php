<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        //$user = auth()->user();
        
        //dd(auth()->user()->name);
        //dd(auth()->user()->posts);
        return view('dashboard');
    }
}
