<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Whatwe;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\News;
use App\Models\Management;
use App\Models\BackImage;
use App\Models\Faqs;
use App\Models\Feature;
use App\Models\Messenger;
use App\Models\Partner;
use App\Models\Roadmap;
use App\Models\Service;
use App\Models\About;
use App\Models\Fact;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('rank', 'asc')->get();
        $slider = Slider::latest()->get();
        $whatwe = Whatwe::first();
        $video = Video::latest()->get();
        $gallery = Gallery::latest()->get();
        $management = Management::latest()->get();
        $news = News::latest()->get();
        $backimage = BackImage::first();
        $partner = Partner::latest()->get();
        $roadmap=Roadmap::latest()->get();
        $service = Service::latest()->get();
        $map = 'your_map_data_here';
        $feature=Feature::latest()->get();
        $faqs=Faqs::latest()->get();
        $about=About::latest()->get();
        $fact=Fact::latest()->get();



        return view('pages.website.index', compact('category', 'slider', 'gallery', 'video', 'management', 'news', 'whatwe', 'backimage', 'partner', 'service','map','feature','roadmap','faqs','about', 'fact' ));
    }
    public function about() {
        $about=About::latest()->get();

        $backimage = BackImage::first();
        return view('pages.website.about', compact('backimage','about'));




    }
    public function service() {
        $backimage = BackImage::first();
        $service = Service::latest()->get();
        return view('pages.website.service', compact('service', 'backimage'));
    }
    public function  serviceDetail($id) {
        $service = Service::find($id);
        if($service) {
            $serviceList = Service::latest()->get();
            return view('pages.website.service-detail', compact('service', 'serviceList'));
        } else {
            $backimage = BackImage::first();
            return view('pages.website.not-found', compact('backimage'));
        }
    }
    public function management() {
        $backimage = BackImage::first();
        $management = Management::latest()->get();
        return view('pages.website.management', compact('backimage', 'management'));
    }
    public function gallery() {
        $backimage = BackImage::first();
        $gallery = Gallery::latest()->get();
        return view('pages.website.gallery', compact('backimage', 'gallery'));
    }
    public function video() {
        $video = Video::latest()->get();
        return view('pages.website.video', compact('video'));
    }
    public function product() {
        $backimage = BackImage::first();
        $messenger = Messenger::first();
        $product = Product::orderBy('rank', 'asc')->get();
        return view('pages.website.product', compact('backimage', 'product', 'messenger'));
    }
    public function subcategory($id) {
        $category = Category::find($id);
        if (isset($category)) {
            $subcategory = Subcategory::where('category_id', $id)->get();
            $backimage = BackImage::first();
            return view('pages.website.subcategory', compact('category', 'subcategory', 'backimage'));
        } else {
            $backimage = BackImage::first();
            return view('pages.website.not-found', compact('backimage'));
        }
    }
    // subcategory id pass bellow
    public function productSubcate($id) {
        $messenger = Messenger::first();
        $subcategory = Subcategory::find($id); // subcategory id retrieve which the product contain
        if (isset($subcategory)) {
            $category = Category::where('id', $subcategory->category_id)->first();
            $product = Product::where('subcategory_id', $id)->get();
            $backimage = BackImage::first();
            return view('pages.website.product-subcat', compact('subcategory','product', 'category', 'backimage', 'messenger'));
        } else {
            $backimage = BackImage::first();
            return view('pages.website.not-found', compact('backimage'));
        }
    }

    public function productDetail($id) {
        $messenger = Messenger::first();
        $product = Product::find($id);
        $category = Category::where('id', $product->category_id)->first();
        $subcategory = Subcategory::where('id', $product->subcategory_id)->first();
        $backimage = BackImage::first();
        return view('pages.website.product-detail', compact('messenger','product', 'category', 'backimage', 'subcategory'));
    }
    public function news() {
        $news = News::latest()->get();
        $backimage = BackImage::first();
        return view('pages.website.news', compact('news', 'backimage'));
    }

    public function newsDetail($id) {
        $news = News::find($id);
        if (isset($news)) {
            $backimage = BackImage::first();
            return view('pages.website.news-details', compact('news', 'backimage'));
        } else {
            $backimage = BackImage::first();
            return view('pages.website.not-found', compact('backimage'));
        }
    }
    public function contactUs() {
        $backimage = BackImage::first();
        return view('pages.website.contact-us', compact('backimage'));
    }
    public function roadmap() {
        $roadmap=Roadmap::latest()->get();
        $backimage = BackImage::first();

        return view('pages.website.roadmap', compact('roadmap','backimage'));
    }

    public function feature() {
        $feature=Feature::latest()->get();

        $backimage = BackImage::first();
        return view('pages.website.feature', compact('backimage','feature'));
}

public function faqs() {
    $faqs=Faqs::latest()->get();
 $backimage = BackImage::first();
    return view('pages.website.faqs', compact('faqs','backimage'));
}
}
