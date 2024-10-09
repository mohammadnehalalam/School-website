<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fact;

class FactController extends Controller

{
    public function index()
    {
        $facts = Fact::all();
        return view('pages.admin.fact.index', compact('facts'));
    }

    //store
    public function store(Request $request)
    {
       
        $request->validate([
            'students' => 'required',
            'teachers' => 'required|integer',
            'image' => 'required',

        ]);
        $fact = new Fact();
        $fact->students = $request->students;
        $fact->teachers = $request->teachers;
        if($request->hasFile('image')) {
            // if(!empty($fact->image) && file_exists($fact->image))
            // {
            //     unlink($fact->image);
            // }
            $image = $this->imageUpload($request, 'image', 'uploads/fact');
            $fact->image = $image;
        }
        $fact->save();
        if($fact) {
            return redirect()->route('fact.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Fact $fact)
    {
        return view('pages.admin.fact.edit', compact('fact'));
    }

    //update
    public function update(Request $request, Fact $fact)
    {
    
          $request->validate([
            'students' => 'required',
            'teachers' => 'required|integer',
            'image' => 'required|integer',

        ]);
        $fact = new fact();
        $fact->students = $request->students;
        $fact->teachers = $request->teachers;
        if($request->hasFile('image')) {
            if(!empty($fact->image) && file_exists($fact->image))
            {
                unlink($fact->image);
            }
            $image = $this->imageUpload($request, 'image', 'uploads/fact');
            $fact->image = $image;
        }
        $fact->save();
        if($fact)
        {
            return redirect()->route('fact.index');
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
    }

    // destroy
    public function destroy(Fact $fact)
    {
        $fact->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
