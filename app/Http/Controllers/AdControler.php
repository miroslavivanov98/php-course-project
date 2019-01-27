<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Ad;
use Illuminate\Http\Request;

class AdControler extends Controller
{
    public function __construct() {
        $this->middleware('auth'); //potrebitelq trqbva da e vlqzul v akaunt za da ima dostup do tozi kontroler
    }
    public function index() {
        //return view ads.index with all Ads
        if(isset($_GET['own']) && $_GET['own'] == 1) {
            $ads = Ad::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $own = true;
        }
        else {
            $ads = Ad::where('pending', false)->orderBy('id', 'DESC')->paginate(10);
            $own = false;
        }
        return view('ads.index')->with('ads', $ads)->with('own', $own);
        
    }

    public function show($id) {
        //return view ads.show with ad
        $ad = Ad::find($id);
        if(!$ad) abort(404);
        return view('ads.show')->with('ad',$ad);
    }

    public function create() {
        //return view ads.create
        return view('ads.create');
    }
    
    public function store(Request $request) {
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
        $ad->pending = true;
        $ad->save();

        return redirect('/ads/');
    }
    public function edit($id) {
        $ad = Ad::find($id);
        if(!$ad) abort(404);
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
            return view ('ads.edit')->with('ad', $ad);
        }
        return redirect('/ads/'.$id);
        //return error/redirect
    }

    public function update($id, Request $request) {
        $ad = Ad::find($id);
        if(!$ad) abort(404);
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
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
            return redirect('/ads/'.$id);
        }
        //return error/redirect
        return redirect('/ads');
    }

    public function destroy($id) {
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
            //delete
            return redirect('/ads/');
        }
        //return error/redirect
    }
    
    public function search(Request $request){
        $search = $request->get('search');
        $ads = Ad::where('title','like','%'.$search.'%')->paginate(5);
        //$ads = DB::table('ads')->where('title','like','%'.$search.'%')->paginate(5);
        return view('admin.ads.index',['Ad'=>$ads]);
    }

}
