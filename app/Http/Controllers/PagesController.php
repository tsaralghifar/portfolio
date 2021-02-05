<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\About;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $main = Main::first();
        $about = About::all();
        return view('pages.index', compact('main','about'));
    }

    public function dashboard() {
        return view('pages.dashboard');
    }
}
