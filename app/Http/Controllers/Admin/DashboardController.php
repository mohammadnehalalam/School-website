<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Product;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Slider;
use App\Models\Query;
use App\Models\Service;
use Illuminate\Routing\Controller;


class DashboardController extends Controller

{
    /**
     * Summary of __construct
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }
    // index
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = count(User::all());
        $slider = count(Slider::all());
        $service = count(Service::all());
        $photos = count(Gallery::all());
        return view('pages.admin.home', compact('users', 'slider', 'service','photos'));
    }
}
