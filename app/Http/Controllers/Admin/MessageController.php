<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function message() {
        $messages = Message::latest()->get();
        return view('pages.admin.message', compact('messages'));
    }
    public function store(Request $request) {
        // $validatedData = $request->validate([
        //     'name' => 'required|min:4',
        //     'email' => 'required|min:4|max:255',
        //     'subject' => 'required|min:8|max:255',
        //     'message' => 'required|min:12',      
        // ]);
        try {
            $message = new Message;
            $message->name = $request->name;
            $message->email = $request->email;
            $message->subject = $request->subject;
            $message->phone = $request->phone;
            $message->message = $request->message;
            $message->save();
            if($message){
                $arr = array('msg' => 'Your query has been submitted Successfully, we will contact you soon!', 'status' => true);
            }
            return response()->json($arr);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()]);
        }
    }
    public function delete($id) {
        $message = Message::find($id);
        $message->delete();
        return Redirect()->back()->with("success", "Message Deleted Successfully");
    }
}
