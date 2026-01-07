<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentStatus;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil data status milik user yang login
        $currentStatus = \App\Models\CurrentStatus::where('user_id', auth()->id())->latest()->first();
        
        // Kirim data ke view home bgian Currently
        return view('home', compact('currentStatus'));
    }
}
