<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Controllers\Controller;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('pages.admin.about.index', compact('abouts'));
    }

    //store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'description'=>'required|string|max:200',

            'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
        ]);
        $about = new About();
        $about->image = $this->imageUpload($request, 'image', 'uploads/about') ?? '';
        $about->description = $request->description;
        $about->date = $request->date;
        $about->save();
        if($about) {
            return redirect()->route('abouts.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(About $about){
       return view('pages.admin.about.edit', compact('about'));
    }

    //update
    public function update(Request $request,About $about)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,bmp,jpeg',
            'description'=>'required|string|max:200',
        ]);
        // image upload
        $aboutImage = '';
        if ($request->hasFile('image')) {
            if (!empty($about->image) && file_exists($about->image)) {
                unlink($about->image);
            }
            $aboutImage = $this->imageUpload($request, 'image', 'uploads/service');
        }else{
            $aboutImage = $about->image;
        }

        $about->description= $request->description;
        $about->image = $aboutImage;
        $about->date = $request->date;

        $about->save();
        if($about)
        {
            return redirect()->route('abouts.index')->with('success', 'Update Success');
        }

    }

    // destroy
    public function destroy(About $about)
    {
        if (!empty($about->image) && file_exists($about->image)) {
            unlink($about->image);
        }
        $about->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
