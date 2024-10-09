<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import the Str class if you're using it

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $content = [
            'about_image' => 'path/to/about-image.jpg',
            'about' => 'Some about us content...',
            'logo' => 'path/to/logo-image.png',
            // ...other content data...           // ...other content data
            'name'=> 'website',
            's_description' => 'a',
            'address'=>'',
            'facebook'=>'',
            'twitter'=>'',
            'linkedin'=>'',
            'instagram'=>'',
            'youtube'=>'',
            'email'=>'',
            'phone'=>'',
            // ...other content data...
        ];

        return view('pages.website.index', compact('content'));
    }

    // Image upload method
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
}
