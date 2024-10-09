<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RoadmapController extends Controller

{
    public function index()
    {
        $roadmap = Roadmap::all();
        return view('pages.admin.roadmaps.index', compact('roadmap'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date'=>'required'
        ]);
        $roadmap = new Roadmap();
        $roadmap->title = $request->title;
        $roadmap->date = $request->date;

        $roadmap->save();
        if($roadmap) {
            return redirect()->route('roadmaps.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Roadmap $roadmap)
    {
        return view('pages.admin.roadmaps.edit', compact('roadmap'));
    }

    //update
    public function update(Request $request, Roadmap $roadmap)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'date'=> 'required'
        ]);


        $roadmap->title= $request->title;
        $roadmap->date = $request->date;
        $roadmap->save();
        return redirect()->route('roadmaps.index')->with('success', 'Update Success');
        
    }

    // destroy
    public function destroy(Roadmap $roadmap)
    {

        $roadmap->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
