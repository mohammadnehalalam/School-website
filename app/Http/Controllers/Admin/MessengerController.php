<?php

namespace App\Http\Controllers\Admin;


use App\Models\Messenger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessengerController extends Controller
{
    
   public function edit() {
    $messenger = Messenger::orderBy('id', 'desc')->first();
    return view('pages.admin.messenger', compact('messenger'));
   }
   public function update(Request $request, Messenger $messenger) {
        $request->validate([
            'link' => 'required|url'
        ]);
        try {
            $messenger->link = $request->link;
            $messenger->save();
            return redirect()->back()->with('success', 'Update Success');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed');
            // throw $th;
        }
   }
}
