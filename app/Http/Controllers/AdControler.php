<?php

namespace App\Http\Controllers;

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
        return view('ads.index')->with('ads', Ad::all());
        
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
        //validate
        //store
        //redirect
        return redirect('/ads/');
    }
    public function edit($id) {
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
            //return view
            return view ('ads.edit');
        }
        //return error/redirect
    }

    public function update($id, Request $request) {
        //update
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
            return redirect('/ads/'.$id);
        }
        //return error/redirect
    }

    public function destroy($id) {
        if(Auth::user()->id == $ad->user->id) { //User is logged in and they own this ad
            //delete
            return redirect('/ads/');
        }
        //return error/redirect
    }
}
