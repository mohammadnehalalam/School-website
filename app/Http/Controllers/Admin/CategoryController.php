<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Redirect;
use Image;

class CategoryController extends Controller
{
    
    public function index()
    {
        $category = Category::orderBy('rank', 'asc')->get();
        return view('pages.admin.categories', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:100',
            'rank' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png,jpg,gif,webp',
        ]);
        try {
            $imgName = '';
            if($request->hasFile('image')){
                $image = $request->file('image');
                $nameGen = hexdec(uniqid());
                $imgExt = strtolower($image->getClientOriginalExtension());
                $imgName = $nameGen. '.' . $imgExt;
                $upLocation = 'uploads/category/';
                // $image->move($upLocation, $imgName);
                Image::make($image)->resize(768,768)->save($upLocation . $imgName);
                $lastImage = $upLocation . $imgName;
            }
            $category = new Category();
            $category->name = $request->name;
            $category->rank = $request->rank;
            $category->image = $lastImage;
            $category->save();
            
            $notification=array(
                'message'=>'Category Created Succefully..',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryData = Category::findOrFail($id);
        $category = Category::orderBy('rank', 'asc')->get();
        return view('pages.admin.categories', compact('category', 'categoryData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'rank' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp',
        ]);
        
        try {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            if(($category->rank != $request->rank) && Category::where('rank', $request->rank)->count() > 0 ) {
                return Redirect()->back()->with('error', 'Rank Exist!');
            } else {
                $category->rank = $request->rank;
            }
            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                Image::make($image)->resize(768,768)->save('uploads/category/' . $imageName);
                if(file_exists($category->image) && !empty($category->image)) {
                    unlink($category->image);
                }
                $lastImage = 'uploads/category/'. $imageName;
                $category['image'] = $lastImage;
            }
            $category->save();

            // $notification=array(
            //     'message'=>'Category Updated Succefully..',
            //     'alert-type'=>'success'
            // );
            // return Redirect()->route('admin.categories')->with($notification);
            return Redirect()->route('admin.categories')->with('success', 'Update Successful!');

        } catch (\Exception $e) {
            return Redirect()->back()->with('error', 'Update Failed!');
            // $notification=array(
            //     'message'=>'Something went wrong',
            //     'alert-type'=>'success'
            // );
            // return Redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category){
            if(file_exists($category->image) AND !empty($category->image)){
                unlink($category->image);
            }
            $category->delete();
        }
        // $notification=array(
        //     'message'=>'Category Deleted Succefully..',
        //     'alert-type'=>'success'
        // );
        // return Redirect()->back()->with($notification);
        return Redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
