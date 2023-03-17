<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserProfile(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.profile.user_profile',compact('userData'));
    }
    public function UserProfileStore(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if($request->file('profile_photo_path')){
          $file = $request->file('profile_photo_path');
          @unlink(public_path('upload/user_profile_image/'.$data->profile_photo_path));
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/user_profile_image'),$filename);
          $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message'   => 'Updated User profile Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function UserChangePassword(){
        return view('frontend.profile.user_change_password');
    }
    public function UserPasswordStore(Request $request){
             $request->validate([
            'oldPassword'=> 'required',
            'password'=> 'required',
            'password_confirmation'=> 'required| same:password',
        ]);
        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword,$hashPassword)){
            $admin = User::find(Auth::id());
            // $admin->password = bcrypt($request->password);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
             $notification = array(
            'message'   => 'User Password Updated Successfully',
            'alert-type'=> 'success',
             );
            return redirect()->route('login')->with($notification);
        }
        else{
            session()->flash('message','Old Password is not match');
            return redirect()->back();

        }
    }
}
