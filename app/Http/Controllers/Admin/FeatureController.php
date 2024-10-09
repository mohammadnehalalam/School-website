<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();
        return view('pages.admin.feature.index', compact('features'));
    }

    //store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|min:3',
            'description'=>'required|string|max:200',

            'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
        ]);
        $feature = new Feature();
        $feature->title = $request->title;
        $feature->image = $this->imageUpload($request, 'image', 'uploads/feature') ?? '';
        $feature->description = $request->description;
        $feature->date = $request->date;
        $feature->save();
        if($feature) {
            return redirect()->route('features.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Feature $feature){
       return view('pages.admin.feature.edit', compact('feature'));
    }

    //update
    public function update(Request $request,Feature $feature)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'image' => 'mimes:jpg,png,bmp,jpeg',
            'description'=>'required|string|max:200',
        ]);
        // image upload
        $FeatureImage = '';
        if ($request->hasFile('image')) {
            if (!empty($feature->image) && file_exists($feature->image)) {
                unlink($feature->image);
            }
            $FeatureImage = $this->imageUpload($request, 'image', 'uploads/service');
        }else{
            $FeatureImage = $feature->image;
        }

        $feature->title= $request->title;
        $feature->image = $FeatureImage;
        $feature->description = $request->description;

        $feature->save();
        if($feature)
        {
            return redirect()->route('features.index')->with('success', 'Update Success');
        }
    }

    // destroy
    public function destroy(Feature $feature)
    {
        if (!empty($feature->image) && file_exists($feature->image)) {
            unlink($feature->image);
        }
        $feature->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
