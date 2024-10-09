<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
// use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Map;

class MapController extends Controller
{
   public function edit() {
    $map = Map::orderBy('id', 'desc')->first();
    return view('pages.admin.map', compact('map'));
   }
   public function update(Request $request, Map $map) {
        $request->validate([
            'link' => 'required|url'
        ]);
        try {
            $map->link = $request->link;
            $map->save();
            return redirect()->back()->with('success', 'Update Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed');
            // throw $th;
        }
   }
}
