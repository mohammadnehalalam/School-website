<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\News;
use Image;

class NewsController extends Controller
{
    public function index() {
        $news = News::latest()->get();
        return view('pages.admin.news.index', compact('news'));
    }
    public function store(Request $request) {
        // return $request;
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif,webp',
        ]);
        $image = $request->file('image');
        $nameGen = hexdec(uniqid());
        $imgExt = strtolower($image->getClientOriginalExtension());
        $imgName = $nameGen. '.' . $imgExt;
        $upLocation = 'uploads/news/';
        // $image->move($upLocation, $imgName);
        Image::make($image)->resize(600,500)->save($upLocation . $imgName);

        try {
            $news = new News;
            $news->title = $request->title;
            $news->description = $request->description;
            $news->image = $upLocation . $imgName;
            $news->created_at = Carbon::now();
            $news->save();
            return redirect()->back()->with('success', 'News Insertion Successfull!');
        } catch (\Exception $e) {        
		    // return ["error" => $e->getMessage()];
            return Redirect()->back()->with('error', 'News Insertion Failed!');
        }
    }
    public function edit($id) {
        $news = News::find($id);
        return view('pages.admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:10',
            'image' => 'Image|mimes:jpeg,jpg,png,gif,webp'
        ]);

        try {
            $news = News::find($id);
            $news->title = $request->title;
            $news->description = $request->description;

            $image = $request->file('image');
            if($image) {
                $imageName = date('YmdHi').$image->getClientOriginalName();
                // $image->move('img/news', $imageName);
                Image::make($image)->resize(600,500)->save('uploads/news/' . $imageName);
                if(file_exists($news->image) && !empty($news->image)) {
                    unlink($news->image);
                }
                $news['image'] = 'uploads/news/'.$imageName;
            }
            $news->save();
            return Redirect()->back()->with("success", "Update Successfull");
        } catch(\Exception $e) {
            DB::rollback();         
		    // return ["error" => $e->getMessage()];
            return redirect()->back()->with('error', 'Team insert failed!');
        }
    }
    public function delete($id) {
        $news = News::find($id);
        if(file_exists($news->image) AND !empty($news->image)){
            unlink($news->image);
        }
        $news->delete();
        return Redirect()->back()->with("success", "Deleted Successfully");
    }
}
