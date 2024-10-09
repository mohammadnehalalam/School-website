<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('pages.admin.partner.index', compact('partners'));
    }

    //store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|min:3',
            'image' => 'required|mimes:jpg,png,bmp,jpeg,webp|image',
        ]);
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->image = $this->imageUpload($request, 'image', 'uploads/partner') ?? '';
        $partner->save();
        if($partner) {
            return redirect()->route('partner.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Partner $partner)
    {
        return view('pages.admin.partner.edit', compact('partner'));
    }

    //update
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' => 'mimes:jpg,png,bmp,jpeg',
        ]);
        // image upload
        $partnerImage = '';
        if ($request->hasFile('image')) {
            if (!empty($partner->image) && file_exists($partner->image)) {
                unlink($partner->image);
            }
            $partnerImage = $this->imageUpload($request, 'image', 'uploads/service');
        }else{
            $partnerImage = $partner->image;
        }

        $partner->name = $request->name;
        $partner->image = $partnerImage;
        $partner->save();
        if($partner)
        {
            return redirect()->route('partner.index');
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
    }

    // destroy
    public function destroy(Partner $partner)
    {
        if (!empty($partner->image) && file_exists($partner->image)) {
            unlink($partner->image);
        }
        $partner->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
