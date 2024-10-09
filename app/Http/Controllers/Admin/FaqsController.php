<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faqs::all();
        return view('pages.admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'title' => 'required', 'min:4',
            'date' => 'required'

           ]);
        try {
            $faqs = new Faqs();
            $faqs->title = $request->title;
            $faqs->description = $request->description;
            $faqs->date = $request->date;

            $faqs->save();
            return Redirect()->back()->with('success', 'insert successful');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('insert failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faq)
    {
        return view('pages.admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Faqs $faq)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'description' => 'required|string|max:200'
        ]);
        // image upload


        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->save();
        if($faq)
        {
            return redirect()->route('faqs.index')->with('success', 'Update Success');
        }
    }

    // destroy

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $faq)
    {

        $faq->delete();
        return redirect()->back()->with('success', 'Deleted Successfull');
    }
}
