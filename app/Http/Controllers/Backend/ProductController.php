<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.product.add_product',compact('brands','categories','subcategories'));
    }
        // sub category
    public function GetSubCategory($category_id){

     	$subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcat);
    }
    // sub sub category
    public function GetSubSubCategory($subcategory_id){

     	$subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subSubcategory_name_en','ASC')->get();
     	return json_encode($subsubcat);
    }
}
