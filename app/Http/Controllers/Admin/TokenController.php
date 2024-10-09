<?php

namespace App\Http\Controllers\admin;
use App\Models\Token;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = Token::all();
        return view('pages.admin.token.index', compact('tokens'));
    }

    //store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'days' => 'required|integer',
            'hours' => 'required|integer',
            'minutes' => 'required|integer',
            'seconds' => 'required|integer',

        ]);
        $token = new token();
        $token->days = $request->days;
        $token->hours = $request->hours;
        $token->minutes = $request->minutes;
        $token->seconds = $request->seconds;

        $token->save();
        if($token) {
            return redirect()->route('token.index')->with('success', 'Insert Successfull');
        }
        return redirect()->back()->withInput();
    }

    //edit
    public function edit(Token $token)
    {
        return view('pages.admin.token.edit', compact('token'));
    }

    //update
    public function update(Request $request, token $token)
    {
        $request->validate([
            'days' => 'required|integer',
            'hours' => 'required|integer',
            'minutes' => 'required|integer',
            'seconds' => 'required|integer',
        ]);
        // image upload


        $token->days = $request->days;
        $token->hours = $request->hours;
        $token->minutes = $request->minutes;
        $token->seconds = $request->seconds;
        $token->save();
        if($token)
        {
            return redirect()->route('token.index');
        }
        return redirect()->back()->withInput()->with('success', 'Update Success');
    }

    // destroy
    public function destroy(Token $token)
    {
        $token->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
