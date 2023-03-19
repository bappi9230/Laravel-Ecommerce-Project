<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }
    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_bn'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_en.required' => 'Input Brand Bangla Name',
        ]);
          $image = $request->file('brand_image');
        //   @unlink(public_path('upload/brand_image/'.$data->profile_photo_path));

          $imageName = date('YmdHi').$image->getClientOriginalName();
        //   $image->move(public_path('upload/brand_image'),$imageName);
         Image::make($image)->resize(300,300)->save('upload/brand_image/'.$imageName);
          $save_url = 'upload/brand_image/'.$imageName;
          Brand::insert([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_bn'=>$request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
                'brand_image'=>$save_url,
          ]);
        $notification = array(
            'message'   => 'Brand Inserted Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }
    public function BrandUpdate(Request $request){
        $brandId = $request->id;
        $old_image = $request->old_image;
        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            unlink($old_image);
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(300,300)->save('upload/brand_image/'.$image_reName);
            $save_url_DB = 'upload/brand_image/'.$image_reName;

            Brand::findOrFail($brandId)->update([
                'brand_name_en'=> $request->brand_name_en,
                'brand_name_bn'=> $request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
                'brand_image'=> $save_url_DB,
           ]);

        $notification = array(
            'message' => 'Brand Updated With successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.brand')->with($notification);
        }
        else{
            Brand::findOrFail($brandId)->update([
                'brand_name_en'=> $request->brand_name_en,
                'brand_name_bn'=> $request->brand_name_bn,
                'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn'=>str_replace(' ','-',$request->brand_name_bn),
           ]);

        $notification = array(
            'message' => 'Brand Updated Without successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.brand')->with($notification);
        }
    }
    public function BrandDelete($id){
            $brand = Brand::findOrFail($id);
            $image = $brand->brand_image;
            unlink($image);
            Brand::findOrFail($brand)->delete();
        $notification = array(
            'message' => 'Brand Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }
}
