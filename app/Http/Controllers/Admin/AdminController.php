<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //Add or remove admins

    /**
     * Shows a listing of all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Shows a listing of all users
     * 
     * @param int $id
     * @param int $admin
     * @return \Illuminate\Http\Response
     */
    public function makeadmin($id, $admin) {
        if($admin < 0 || $admin > 1) {return redirect('/');} //Admin param not 0 or 1

        $user = User::find($id);
        if(!$user) abort(404); //User not found

        $user->admin = $admin;
        $user->save();
        return redirect('/admin/users');
    }
}
