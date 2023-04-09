<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminUser = Auth::guard('admin')->user()->id;
        $adminData = Admin::find($adminUser);
//        dd($adminData);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function AdminProfileEdit(){
        $adminUser = Auth::guard('admin')->user()->id;

        $adminData = Admin::find($adminUser);
        return view('admin.admin_profile_edit',compact('adminData'));
    }
    public function AdminProfileStore(Request $request){

        $adminUser = Auth::guard('admin')->user()->id;
        $data = Admin::find($adminUser);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){

            $image = $request->file('profile_photo_path');

          @unlink(public_path('upload/admin_image/'.$data->profile_photo_path));

          $name_gen = hexdec(uniqid('',false)).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(225,225)->save('upload/admin_image/'.$name_gen);
          $data['profile_photo_path'] = 'upload/admin_image/'.$name_gen;
        }
        $data->save();
        $notification = array(
            'message'   => 'Updated admin profile Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }
    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }
    public function AdminUpdateStore(Request $request){
        $adminUser = Auth::guard('admin')->user()->id;
        $request->validate([
            'oldPassword'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required| same:password',
        ]);
        $hashPassword = Admin::find($adminUser)->password;
        if(Hash::check($request->oldPassword,$hashPassword)){
            $admin = Admin::find($adminUser);
            // $admin->password = bcrypt($request->password);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.login');
        }
        else{
            session()->flash('message','Old Password is not match');
            return redirect()->back();

        }
    }

    public function AllUsers(){

//          $user = new User();
//          dd($user->UserOnline());
//
        $users = User::latest()->get();
        return view('backend.user.all_user',compact('users'));
    }




}
