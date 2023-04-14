<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){

        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();

        $products = Product::where('status',1)->orderBy('id','DESC')->get();

        $categories = Category::latest()->get();

        $features = Product::where('featured',1)->orderBy('id','DESC')->get();

        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();

        $special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->get();

        $special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        ///product tags
        $tags_en= Product::groupBy('product_tags_en','id')->select('product_tags_en','id')->get();
        $tags_bn= Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
//        dd($tags_en);
        $blogpost = BlogPost::latest()->get();


        /////// New Arrival Product /////////////////
        $new_arrivals = Product::latest()->limit(5)->get();

        ///////top sale product/////////////
        $top_sale = DB::table('products')
                    ->leftJoin('order_items','products.id','=','order_items.product_id')
                    ->selectRaw('products.id, SUM(order_items.qty) as total')
                    ->groupBy('products.id')
                    ->orderBy('total','DESC')
                    ->limit(5)
                    ->get();
        $products = [];
       foreach ($top_sale as $product){
           $products[]= Product::findOrFail($product->id);
        }
        return view('frontend.index',compact('categories','sliders','products','features','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','tags_en','tags_bn','blogpost','new_arrivals','products'));

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
        //color
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn= $product->product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        ///size
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        //related products
        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();


        $multi_image = MultiImg::where('product_id',$id)->get();

        ///////////review/////////////////
        $review = Review::where('product_id',$id)->where('status',1)->get();

        $avg_review = Review::where('product_id',$id)->where('status',1)->avg('review');


        return view('frontend.product.product_details',compact('product','multi_image','product_color_bn','product_color_en','product_size_bn','product_size_en','relatedProduct','review','avg_review'));
    }




    public function TagWiseProductView($tag){
        if(session()->get('language') == 'bangla'){
        $products = Product::where('status',1)->where('product_tags_bn',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tag.tag_view',compact('products','categories'));
        }
        else{
        $products = Product::where('status',1)->where('product_tags_en',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tag.tag_view',compact('products','categories'));
        }
    }



    public function SubCategoryWiseProductView(Request $request,$id,$slug){
        $products = Product::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $breadSubCat = SubCategory::with('category')->where('id',$id)->get();


        ///  Load More Product with Ajax
        if ($request->ajax()) {
            $grid_view = view('frontend.product.grid_view_product',compact('products'))->render();

            $list_view = view('frontend.product.list_view_product',compact('products'))->render();

            return response()->json(['grid_view' => $grid_view, 'list_view'=>$list_view]);

        }
        ///  End Load More Product with Ajax


        return view('frontend.product.subcategory_view',compact('products','categories','breadSubCat'));

    }



    public function SubSubCategoryWiseProductView($id,$slug){
        $products = Product::where('status',1)->where('subSubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $breadSubSubCat = SubSubCategory::with('category','subcategory')->where('id',$id)->get();

        return view('frontend.product.sub_subcategory_view',compact('products','categories','breadSubSubCat'));
    }

    /// Product View With Ajax
    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,

        ));

    } // end method



    public function ProductSearch(Request $request){

            $request->validate(["search" => "required"]);

            $search = $request->search;

            $products = Product::where('product_name_en','LIKE',"%$search%")->get();

            return view('frontend.product.product_search',compact('products'));


    }

    ///// Advance Search Options ////////////////

    public function SearchProduct(Request $request){

        $request->validate(["search" => "required"]);

        $item = $request->search;

        $products = Product::where('product_name_en','LIKE',"%$item%")->select('id','product_name_en','product_thumbnail','selling_price','product_slug_en')->limit(5)->get();

        return view('frontend.product.search_product',compact('products'));
    } // end method


}
