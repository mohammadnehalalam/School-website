<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Whatwe;


class WhatweController extends Controller
{
    // Edit
    public function edit()
    {
        $whatwe = Whatwe::first();
        return view('pages.admin.whatwe.content', compact('whatwe'));
    }

    // Company profile Update 
    public function update(Request $request, Whatwe $whatwe)
    {
        $request->validate([
            'title1' => 'required',
            'description1' => 'required|min:10',
            'title2' => 'required',
            'description2' => 'required|min:10',
        ]);
        try {
            $whatwe->title1 = $request->title1;
            $whatwe->description1 = $request->description1;
            $whatwe->title2 = $request->title2;
            $whatwe->description2 = $request->description2;
            $whatwe->save();
            if($whatwe){
                return redirect()->back()->with('success', 'Update Successfull!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->withInput();
        }
        
    }
}
