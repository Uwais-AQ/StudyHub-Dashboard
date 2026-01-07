<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentStatus;

class StatusController extends Controller
{
    public function edit() {
        $status = CurrentStatus::firstOrCreate(['user_id' => auth()->id()]);
        return view('status.edit', compact('status'));
}

    public function update(Request $request) {
        $status = CurrentStatus::where('user_id', auth()->id())->latest()->first();

        if (!$status) {
        $status = new CurrentStatus();
        $status->user_id = auth()->id();
        }

        $status->reading = $request->reading;
        $status->studying = $request->studying;
        $status->watching = $request->watching;
        $status->save(); 

        return redirect()->route('home')->with('success', 'Status diperbarui!');
}}
