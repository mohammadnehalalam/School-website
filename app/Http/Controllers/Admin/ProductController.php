<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Redirect;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $subcategory = Subcategory::latest()->get();
        $category = Category::latest()->get();
        $product = Product::orderBy('rank', 'ASC')->get();
       
        return view('pages.admin.product', compact('subcategory', 'category', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required|max:100',
            'rank' => 'required|unique:products',
            'code' => 'max:50',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp',
            'price' => 'numeric'
        ]);
        
        try {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(768,768)->save('uploads/product/thumb/'.$name_gen);
            $image->move('uploads/product', $name_gen);
            $image_url = 'uploads/product/'.$name_gen;
            $thumb_url = 'uploads/product/thumb/'.$name_gen;

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->name = $request->name;
            $product->rank = $request->rank;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->image = $image_url;
            $product->image_thumb = $thumb_url;
            $product->save();
            return Redirect()->route('admin.products')->with('success', 'Product Insertion Succeful!');

        } catch (\Exception $e) {   
            return $e->getMessage();
            return Redirect()->back()->with('error', 'Insertion Failed!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSubCate($subcat_id)
    {
        $subcate = Subcategory::where('category_id', $subcat_id)->orderBy('name' , 'ASC')->get();
        return json_encode($subcate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productData = Product::find($id);
        $productSubData = Subcategory::where('category_id', $productData->category_id)->get();
        $subcategory = Subcategory::latest()->get();
        $category = Category::latest()->get();
        $product = Product::latest()->get();
        return view('pages.admin.product', compact('productData', 'subcategory', 'category', 'product', 'productSubData'));
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
        $validatedData = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'name' => 'required|max:100',
            'rank' => 'required',
            'code' => 'max:50',
            'image' => 'image|mimes:jpeg,jpg,png,gif,webp',
            'price' => 'numeric',
        ]);
        try {
            $product = Product::find($id);

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $imgExt = $image->getClientOriginalExtension();
                $imageName = $product->image;
                $nameWithoutExt = explode('.', $imageName)[0];
                $nameWithoutPath = explode('/',$nameWithoutExt)[2];
                $orinalImageName = 'uploads/product/' . $nameWithoutPath . '.' . $imgExt;
                $thumbImageName = 'uploads/product/thumb/' . $nameWithoutPath . '.' . $imgExt;

                if(file_exists($product->image) AND $product->image != null) {
                    unlink($product->image);
                }
                if(file_exists($product->image_thumb) AND $product->image_thumb != null) {
                    unlink($product->image_thumb);
                }
                Image::make($image)->resize(768,768)->save($thumbImageName);
                $image->move('uploads/product', $orinalImageName);

                $product->image = $orinalImageName;
                $product->image_thumb = $thumbImageName;
            }
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->name = $request->name;
            if(($product->rank != $request->rank) && Product::where('rank', $request->rank)->count() > 0 ) {
                return Redirect()->back()->with('error', 'Rank Exist!');
            } else {
                $product->rank = $request->rank;
            }
            $product->code = $request->code;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();
            return Redirect()->route('admin.product.edit', $id)->with('success', 'Update Successful!');
        } catch (\Throwable $th) {
            throw $th;
            return Redirect()->back()->with('failed', 'Product Update Failed!');
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
        $product = Product::find($id);
       
        if(file_exists($product->image) AND $product->image != null) {
            unlink($product->image);
        }
        if(file_exists($product->image_thumb) AND $product->image_thumb != null) {
            unlink($product->image_thumb);
        }
        $product->delete();
        return Redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
