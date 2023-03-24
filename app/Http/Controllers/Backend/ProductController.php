<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class ProductController extends Controller
{
    public function AddProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.product.add_product',compact('brands','categories','subcategories'));
    }
    // Store product
    public function ProductStore(Request $request){

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subSubcategory_id' => $request->subSubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_bn' => $request->product_name_bn,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_bn' => $request->product_tags_bn,
      	'product_size_en' => $request->product_size_en,
      	'product_size_bn' => $request->product_size_bn,
      	'product_color_en' => $request->product_color_en,
      	'product_color_bn' => $request->product_color_bn,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_bn' => $request->short_descp_bn,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_bn' => $request->long_descp_bn,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thumbnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),
      ]);

    //   multi image store
        $multi_images = $request->file('multi_img');
        foreach($multi_images as $multi_image){
            $image_rename = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(917,1000)->save('upload/products/multi_image/'.$image_rename);
            $upload_path = 'upload/products/multi_image/'.$image_rename;

            MultiImg::insert([
                'product_id'=> $product_id,
                'photo_name'=> $upload_path,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message'   => 'Product Inserted Successfully',
            'alert-type'=> 'info',
        );
        return redirect()->route('product.view')->with($notification);
	}

    // produc view

    public function ProductView(){
        $categories = Category::orderby('category_name_en','ASC')->get();
        $subSubcategories = SubSubCategory::latest()->get();
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('subSubcategories','categories','products'));
    }
    public function ProductEdit($id){

        $subSubcategories = SubSubCategory::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);
        $multi_images = MultiImg::where('product_id',$id)->get();
        return view('backend.product.product_edit',compact('subSubcategories','subcategories','categories','brands','products','multi_images'));
    }

    	public function ProductUpdate(Request $request){

		$product_data_id = $request->id;
        $old_image = $request->old_image;
        // dd($product_data_id);
        if($request->file('product_thumbnail')){
            $image = $request->file('product_thumbnail');
            unlink($old_image);
            $image_rename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/products/thumbnail/'.$image_rename);
            $image_save = 'upload/products/thumbnail/'.$image_rename;

            // save with image
         Product::findOrFail($product_data_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subSubcategory_id' => $request->subSubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $image_save,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
    //   save without image
        Product::findOrFail($product_data_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subSubcategory_id' => $request->subSubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
      ]);

          $notification = array(
			'message' => 'Product Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
	}


    /// Multiple Image Update
	public function MultiImgUpdate(Request $request){
		$imgs = $request->multi_img;
            if($imgs ){
            foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $Image_rename = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$Image_rename);
            $uploadPath = 'upload/products/multi_image/'.$Image_rename;

            MultiImg::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);

            } // end foreach

            $notification = array(
                'message' => 'Product Image Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
            }
        else{
            $notification = array(
                'message' => 'you don not Select any image to uploaded!!!!!',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }

	} // end mehtod

    public function DeleteImage($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	$notification = array(
			'message' => 'Product Image Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     } // end method

    //  product Active
    public function ProductInactive($id){
     	Product::findOrFail($id)->update(['status' => 0]);
     	$notification = array(
			'message' => 'Product Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }

//    product Inactive /
  public function ProductActive($id){
  	Product::findOrFail($id)->update(['status' => 1]);
     	$notification = array(
			'message' => 'Product Active',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

     }

     public function ProductDelete($id)
     {
        $product = Product::findOrFail($id);
     	unlink($product->product_thumbnail);
     	Product::findOrFail($id)->delete();

     	$images = MultiImg::where('product_id',$id)->get();
     	foreach ($images as $img) {
     		unlink($img->photo_name);
     		MultiImg::where('product_id',$id)->delete();
     	}

     	$notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
     }

}
