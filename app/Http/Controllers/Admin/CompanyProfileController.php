<?php

namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Routing\Controller;


class CompanyProfileController extends Controller
{
    public function imageUpload(Request $request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqid() . '.' . $extension; // Corrected uniqid() spelling
            $image->move($directory, $imageName);
            return $directory . '/' . $imageName;
        };

        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
            if (is_array($file) && count($file)) {
                $imagesPath = [];
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }

        return false;
    }
    // Edit
    public function edit()
    {
        $company = CompanyProfile::first();
        return view('pages.admin.company.content', compact('company'));
    }

    // Company profile Update
    public function update(Request $request, CompanyProfile $company)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required|string',
            'logo' => 'mimes:jpg,jpeg,png,bmp',
            'about_image' => 'mimes:jpg,jpeg,png,bmp,webp',
            's_description' => 'max:500'
        ]);

        // Image Update
        try {
            $companyLogo = $company->logo;
            $AboutImage = $company->about_image;
            $BgImage = $company->bg_image;

            if($request->hasFile('logo')) {
                if(!empty($company->logo) && file_exists($company->logo))
                {
                    unlink($company->logo);
                }
                $companyLogo = $this->imageUpload($request, 'logo', 'uploads/about');
            }

            if($request->hasFile('about_image')) {
                if(!empty($company->about_image) && file_exists($company->about_image))
                {
                    unlink($company->about_image);
                }
                $AboutImage = $this->imageUpload($request, 'about_image', 'uploads/about');
            }

            // if($request->hasFile('bg_image')) {
            //     if(!empty($company->bg_image) && file_exists($company->bg_image))
            //     {
            //         unlink($company->bg_image);
            //     }
            //     $BgImage = $this->imageUpload($request, 'bg_image', 'uploads/about');
            // }
            $company->name = $request->name;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->about = $request->about;
            $company->s_description = $request->s_description;
            $company->facebook = $request->facebook;
            $company->youtube = $request->youtube;
            $company->instagram = $request->instagram;
            $company->twitter = $request->twitter;
            $company->linkedin = $request->linkedin;
            $company->logo = $companyLogo;
            $company->about_image = $AboutImage;
            // $company->bg_image = $BgImage;
            $company->save();
            return redirect()->back()->with('success','Update Successful!');

        } catch (\Throwable $th) {
            throw $th;
            // return redirect()->back()->withInput();
            return redirect()->back()->with('error', 'Update Failed!');
        }
    }
}
