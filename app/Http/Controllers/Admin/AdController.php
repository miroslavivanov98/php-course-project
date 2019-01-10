<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;

class AdController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obqva = Ad::paginate(3);
        return view('admin.ads.show')->with('obqva',$obqva);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        $obqva = new Ad;
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->save();
        return redirect('/admin/ads');
        // $message = [
        //     'title' => 'Success',
        //     'message' => 'Ad successfully posted',
        //     'btn' => 'Back to Ad listing',
        //     'btn_link' => '/car',
        // ];
        // return view('message')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);
        return view ('admin.ads.show')->with('Ad',$ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);
        return view ('admin.ads.edit')->with('Ad',$ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        $obqva = new Ad;
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->save();
        return redirect('/admin/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ad::find($id)->delete();
        return redirect('/admin/ads');
    }
}
