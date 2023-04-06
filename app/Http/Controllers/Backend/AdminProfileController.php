<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function AdminProfileEdit(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('adminData'));
    }
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
          $file = $request->file('profile_photo_path');

          @unlink(public_path('upload/admin_image/'.$data->profile_photo_path));

          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/admin_image'),$filename);
          $data['profile_photo_path'] = $filename;
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
        $request->validate([
            'oldPassword'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required| same:password',
        ]);
        $hashPassword = Admin::find(1)->password;
        if(Hash::check($request->oldPassword,$hashPassword)){
            $admin = Admin::find(1);
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
