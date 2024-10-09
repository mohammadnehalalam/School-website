<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Query;

class QueryController extends Controller
{
    public function query() {
        $query = Query::latest()->get();
        return view('pages.admin.query', compact('query'));
    }
    public function queryInsert(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:4',
            'phone' => 'required|min:4|max:255',
            'email' => 'required|min:4|max:255',
            'service' => 'required',
            'message' => 'required|min:8',
        ]);
        try {
            $query = new Query;
            $query->name = $request->name;
            $query->phone = $request->phone;
            $query->email = $request->email;
            $query->service = $request->service;
            $query->message = $request->message;
            $query->created_at = Carbon::now();
            $query->save();
            
            return redirect()->back()->with('success', 'Your query is sent!');
        } catch (\Exception $e) {
        
		    return ["error" => $e->getMessage()];
            //return redirect()->back()->with('error', 'Your query isn\'t delivered!');
        }
    }
    public function queryDelete($id) {
        $query = Query::find($id);
        $query->delete();
        return Redirect()->back()->with("success", "Query Deleted Successfully");
    }
}
