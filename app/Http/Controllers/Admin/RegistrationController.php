<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;
use PhpParser\Node\Stmt\TryCatch;

class RegistrationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('auth.register', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'username' => 'required|unique:users',
            'password' => 'required|min:1',
            'image' => 'mimes:jpg,png,jpeg,bmp'
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->image = $this->imageUpload($request, 'image', 'uploads/user') ?? '';
            $user->save();
            return back()->with('success','User Insertion Successfull!');
        } catch (\Throwable $th) {
            return $th->getMessage();
            // return redirect()->back()->with('error', 'User Insertion Failed!');
        }
    }

    public function settings() {

        return view('auth.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'username' => 'required',
            'image' => 'mimes:jpg,png,jpeg,bmp'
        ]);

        try {
            if(User::where('id', '!=', Auth::id())->where('username', $request->username)->exists()) {

                return back()->with('error','Username exist!');

            } else {

                $user = User::findOrFail(Auth::id());
                $profileImage = '';
                if($request->hasFile('image')) {
                    if(!empty($user->image) && file_exists($user->image)) {
                        unlink($user->image);
                    }
                    $profileImage = $this->imageUpload($request, 'image', 'uploads/user');
                } else {
                    $profileImage = $user->image;
                }

                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->image = $profileImage;
                $user->save();
                return redirect()->back()->with('success', 'Update Successful!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Update Failed!');
        }
    }
}
