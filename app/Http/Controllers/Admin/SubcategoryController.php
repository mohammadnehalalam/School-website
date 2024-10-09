<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use Image;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::orderBy('rank', 'asc')->get();
        $category = Category::latest()->get();
        return view('pages.admin.subcategories', compact('subcategory', 'category'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'rank' => 'required|unique:subcategories',
            'name' => 'required|unique:subcategories,name|max:100',
            'image' => 'required|mimes:jpeg,jpg,png,gif,webp'
        ]);
        
        try {
            $subcategory = new Subcategory();
            $subcategory->category_id = $request->category_id;
            $subcategory->rank = $request->rank;
            $subcategory->name = $request->name;
            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(768,768)->save('uploads/subcategory/' . $imageName);
                $subcategory['image'] = $imageName;
            }
            $subcategory->save();

            $notification=array(
                'message'=>'Subcategory Created Succefully..',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {   

            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $subcategoryData = Subcategory::findOrFail($id);
        $subcategory = Subcategory::orderBy('rank', 'asc')->get();
        $category = Category::latest()->get();
        return view('pages.admin.subcategories', compact('subcategory', 'subcategoryData', 'category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'rank' => 'required',
            'name' => 'required|max:100',
        ]);
        
        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->category_id = $request->category_id;
            $subcategory->name = $request->name;

            if($subcategory->rank != $request->rank && Subcategory::where('rank', $request->rank)->count() > 0) {
                return redirect()->back()->with('error', 'Rank Exists');
            } else {
                $subcategory->rank = $request->rank;
            }
            
            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(768,768)->save('uploads/subcategory/' . $imageName);
                if(file_exists('uploads/subcategory/'. $subcategory->image) && !empty($subcategory->image)) {
                    unlink('uploads/subcategory/' . $subcategory->image);
                }
                $subcategory['image'] = $imageName;
            }
            $subcategory->save();

            $notification=array(
                'message'=>'Subcategory Updated Succefully..',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $notification=array(
                'message'=>'Something went wrong',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        if($subcategory){
            if(file_exists('uploads/subcategory/'.$subcategory->image) AND !empty($subcategory->image)){
                unlink('uploads/subcategory/'.$subcategory->image);
            }
            $subcategory->delete();
        }
        $notification=array(
            'message'=>'Subcategory Deleted Succefully..',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
