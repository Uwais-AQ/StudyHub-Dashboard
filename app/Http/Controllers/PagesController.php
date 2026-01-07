<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        return view("home");
    }
    public function About(){
        return view("About");
    }
    public function Sources(){
        return view("Sources");
    }
    public function Noteb(){
        return view("Noteb");
    }
    public function Blog(){
        return view("Blog");
    }
    
}
