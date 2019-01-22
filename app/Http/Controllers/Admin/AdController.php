<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ad;
use Auth;
use App\User;
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
        $ad = Ad::all();
        return view('admin.ads.index')->with('obqva',$ad);
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
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $ad = new Ad;
            $ad->image_url = 'error';
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/photos');
            $image->move($destinationPath, $name);
            $ad->image_url = '/photos/'.$name;
        }
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->user_id = Auth::user()->id;
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
        return view ('admin.ads.show')->with('ad',$ad);
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
        return view ('admin.ads.edit')->with('ad',$ad);
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
        //throw new Exception("asdiasjd");
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2000',
        ]);

        $ad = Ad::find($id);
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        
        if($request->hasFile('image')) {
            unlink(public_path('').$ad->image_url);

            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/photos'); 
            $image->move($destinationPath, $name);
            $ad->image_url = '/photos/'.$name;
        }

        $ad->save();
        return redirect('/admin/ads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function delete($id) {
           $ad = Ad::find($id);
           if(!$ad) abort(404);
           return view('admin.ads.delete')->with('ad', $ad); 
    }
    public function destroy($id)
    {
        Ad::find($id)->delete();
        return redirect('/admin/ads');
    }

    public function approve($id) {
        $ad = Ad::find($id);
        $ad->pending = false;
        $ad->save();
        return redirect('/admin/ads/'.$id);
    }
}
