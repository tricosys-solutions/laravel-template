<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('admin_auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.home');
    }

    public function profile() {
        $admin = Auth::guard('web_admin')->user();
        return view('admin.profile',compact('admin'));
    }

    public function updateProfile(Request $request, $id){
        $profile = $request->all();
        $admin = Admin::find($id);
        $admin->name = $profile['name'];
        $admin->email = $profile['email'];
        $admin_r = $admin->update();
        if($admin_r){
            return redirect('admin_profile')->with('updateProfileMessage','Profile Updated Successfully');
        }
    }
}
