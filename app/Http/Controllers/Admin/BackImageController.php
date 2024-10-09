<?php

namespace App\Http\Controllers\Admin;

use App\Models\BackImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image;

class BackImageController extends Controller
{
    public function edit()
    {
        $backimage = BackImage::first();
        return view('pages.admin.backimage.content', compact('backimage'));
    }

    // Company profile Update
    public function update(Request $request, BackImage $backimage)
    {
        $request->validate([
            'bgimage' => 'mimes:jpg,jpeg,png,bmp,webp',
        ]);

        try {
            if ($request->hasFile('bgimage')) {
                $image = $request->file('bgimage');
                $imageName = date('YmdHi') . $image->getClientOriginalName();
                $imagePath = 'uploads/background/' . $imageName;

                // Resize and save the image
                Image::make($image)->resize(1349, 250)->save(public_path($imagePath));

                if (file_exists(public_path($backimage->bgimage))) {
                    unlink(public_path($backimage->bgimage));
                }

                // Update the image path in the database
                $backimage->bgimage = $imagePath;
                $backimage->save();
            }

            return redirect()->back()->with('success', 'Update Successful!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed!');
        }
    }
}
