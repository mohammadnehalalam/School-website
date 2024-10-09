<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

use Image;

class ServiceController extends Controller
{
    public function service() {
        $services = Service::latest()->get();
        return view('pages.admin.service.index', compact('services'));
    }
    public function serviceInsert(Request $request) {
      
        $request->validate([
            'name' => 'required',
            's_description' => 'required|min:6',
        ]);

        try {
            $image = $request->file('image');
            
            $imageName = $this->imageUpload($request, 'image', 'uploads/service');

            $service = new Service;
            $service->name = $request->name;
            $service->description = $request->description;
            $service->s_description = $request->s_description;
            $service->image = $imageName;
            $service->created_at = Carbon::now();
            $service->save();
            return redirect()->back()->with('success', 'Service inserted!');
        } catch (\Exception $e) {
		    return ["error" => $e->getMessage()];
        }
    }
    public function serviceEdit(Request $request, $id) {
        $service = Service::find($id);
        return view('pages.admin.service.edit', compact('service'));
    }
    public function serviceUpdate(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            's_description' => 'required|min:8',
        ]);

        try {
            // DB::beginTransaction();
            $service = Service::find($id);
            $service->name = $request->name;
            $service->description = $request->description;
            $service->s_description = $request->s_description;

            $image = $request->file('image');
            if($image) {
               
                if(file_exists($service->image) && !empty($service->image)) {
                    unlink($service->image);
                }
                $imageName = $this->imageUpload($request, 'image', 'uploads/service');

                $service['image'] = $imageName;
            }
            $service->save();
            // DB::commit();
            return redirect()->back()->with('success', 'Service Updated!');
        } catch (\Exception $e) {
            // DB::rollback();
		    // return ["error" => $e->getMessage()];
            return redirect()->back()->with('error', 'Service update failed!');
        }
    }
    public function serviceDelete($id) {
        $service = service::find($id);
        if(file_exists($service->image) && !empty($service->image)) {
            unlink($service->image);
        }
        $service->delete();
        return Redirect()->back()->with("success", "Service Deleted Successfully");
    }
}
