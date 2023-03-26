<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){

        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $categories = Category::latest()->get();
        $features = Product::where('featured',1)->orderBy('id','DESC')->get();
        $hot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        return view('frontend.index',compact('categories','sliders','products','features','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1'));

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
    //    produc details method
    public function ProductDetails($id,$slug){
        $product =Product::findOrFail($id);
        $multi_image = MultiImg::where('product_id',$id)->get();
        return view('frontend.product.product_details',compact('product','multi_image'));
    }
}
