<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderby('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.sub_category_view',compact('subcategory','categories'));
    }
    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_bn'=>'required',
        ],[
            'category_id.required' => 'Select Category Option',
            'subcategory_name_en.required' => 'Input Category English Name',
            'subcategory_name_bn.required' => 'Input Category Bangla Name',
        ]);
          SubCategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name_en'=>$request->subcategory_name_en,
                'subcategory_name_bn'=>$request->subcategory_name_bn,
                'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
                'subcategory_slug_bn'=>str_replace(' ','-',$request->subcategory_name_bn),
          ]);
        $notification = array(
            'message'   => 'SubCategory Inserted Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id){
        $categories = Category::orderby('category_name_en','ASC')->get();
        $subcategories = SubCategory::findOrFail($id);
        return view('backend.category.sub_category_edit',compact('subcategories','categories'));
    }
    public function SubCategoryUpdate(Request $request){
        $subcategoryId = $request->id;
        SubCategory::findOrFail($subcategoryId)->update([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=>$request->subcategory_name_en,
            'subcategory_name_bn'=>$request->subcategory_name_bn,
            'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            'subcategory_slug_bn'=>str_replace(' ','-',$request->subcategory_name_bn),
        ]);
        $notification = array(
            'message' => 'SubCategory Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }

    // ///////////All sub->subcategory function ////////////////////////////////

    public function SubSubCategoryView(){
        $categories = Category::orderby('category_name_en','ASC')->get();
        $subSubcategories = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('subSubcategories','categories'));
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
    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subSubcategory_name_en'=>'required',
            'subSubcategory_name_bn'=>'required',
        ],[
            'category_id.required' => 'Select Category Option',
            'subcategory_id.required' => 'Select SubCategory Option',
            'subSubcategory_name_en.required' => 'Input Sub-SubCategory English Name',
            'subSubcategory_name_bn.required' => 'Input Sub-SubCategory Bangla Name',
        ]);
          SubSubCategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'subSubcategory_name_en'=>$request->subSubcategory_name_en,
                'subSubcategory_name_bn'=>$request->subSubcategory_name_bn,
                'subSubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subSubcategory_name_en)),
                'subSubcategory_slug_bn'=>str_replace(' ','-',$request->subSubcategory_name_bn),
          ]);
        $notification = array(
            'message'   => 'Sub-SubCategory Inserted Successfully',
            'alert-type'=> 'info',
        );
        return redirect()->back()->with($notification);
    }


    public function SubSubCategoryEdit($id){
        $categories = Category::orderby('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderby('subcategory_name_en','ASC')->get();
        $subSubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('subSubcategories','subcategories','categories'));
    }


    public function SubSubCategoryUpdate(Request $request){
        $subSubcategoryId = $request->id;
        SubSubCategory::findOrFail($subSubcategoryId)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subSubcategory_name_en'=>$request->subSubcategory_name_en,
            'subSubcategory_name_bn'=>$request->subSubcategory_name_bn,
            'subSubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subSubcategory_name_en)),
            'subSubcategory_slug_bn'=>str_replace(' ','-',$request->subSubcategory_name_bn),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subSubcategory')->with($notification);
    }


    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }
}

