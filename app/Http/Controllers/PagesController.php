<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\About;

class PagesController extends Controller
{
    
    
    public function index() {
        $main = Main::first();
        $about = About::all();
        return view('pages.index', compact('main','about'));
    }

}
