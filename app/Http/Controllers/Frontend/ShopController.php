<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function ShopPage(){

        $products = Product::query();

        if (!empty($_GET['category'])) {

            $slugs = explode(',',$_GET['category']);

//            dd($slugs);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds)->paginate(10);
        }
        elseif (!empty($_GET['brand'])){
            $slugs = explode(',',$_GET['brand']);

//            dd($slugs);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds)->paginate(10);
        }
        else{
            $products = Product::where('status',1)->orderBy('id','DESC')->paginate(30);
        }

        $categories = Category::orderBy('category_name_en','ASC')->get();

        $brands = Brand::orderBy('brand_name_en','ASC')->get();
//        dd($categories);
        return view('frontend.shop.shop_page',compact('products','categories','brands'));

    } // end Method


    public function ShopFilter(Request $request){

        $category_name = $request->all();
        $brand_name = $request->all();
        $cat_url ="";
        $brand_url ="";

        if (!empty($category_name['category'])){
            foreach ($category_name['category'] as $category){
                if (empty($cat_url)){
                    $cat_url .="&category=".$category;
                }else{
                    $cat_url .= ','.$category;
                }
            } ///end foreach
            return redirect()->route('shop.page',$cat_url);
        } //end if

        if(!empty($brand_name['brand'])){
            foreach ($brand_name['brand'] as $brand){
                if (empty($brand_url)){
                    $brand_url .="&brand=".$brand;
                }else{
                    $brand_url .= ','.$brand;
                }
            } ///end foreach
            return redirect()->route('shop.page',$brand_url);
        } //end if


    }


    public function ShopBrand($brand_id){
        $products = Product::where('brand_id',$brand_id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::all();
        $brands = Brand::all();
        return view('frontend.shop.shop_page',compact('products','categories','brands'));
    }

}
