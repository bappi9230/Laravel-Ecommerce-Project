<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function BlogCategory(){

        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request){

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_bn' => 'required',

        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_bn.required' => 'Input Blog Category Bangla Name',
        ]);



        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_bn' => str_replace(' ', '-',$request->blog_category_name_bn),
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method



    public function BlogCategoryEdit($id){

        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }




    public function BlogCategoryUpdate(Request $request){

        $blogcar_id = $request->id;


        BlogPostCategory::findOrFail($blogcar_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_bn' => $request->blog_category_name_bn,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_bn' => str_replace(' ', '-',$request->blog_category_name_bn),
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);

    } // end method


    public function BlogCategoryDelete($post_id){

        BlogPostCategory::findOrFail($post_id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    ///////////////////////////// Blog Post ALL Methods //////////////////


    public function ViewBlogPost(){

        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));

    }

    public function BlogPostStore(Request $request){

        $request->validate([
            'post_title_en' => 'required',
            'post_title_bn' => 'required',
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_bn.required' => 'Input Post Title Bangla Name',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid('',false)).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_bn' => $request->post_title_bn,
            'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
            'post_slug_bn' => str_replace(' ', '-',$request->post_title_bn),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_bn' => $request->post_details_bn,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);

    } // end mehtod

    public function AddBlogPost(){

        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));
    }

    public function ListBlogPost(){
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost'));
    }

    public function BlogPostEdit($post_id){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($post_id);
        return view('backend.blog.post.blog_post_edit',compact('blogpost','blogcategory'));
    }

    public function BlogPostUpdate(Request $request, $post_id){

        $old_image = $request->old_image;
        if($request->file('post_image')){
            $image = $request->file('post_image');
            @unlink($old_image);
            $name_gen = hexdec(uniqid('',false)).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
            $save_url = 'upload/post/'.$name_gen;

            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_bn' => $request->post_title_bn,
                'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
                'post_slug_bn' => str_replace(' ', '-',$request->post_title_bn),
                'post_image' => $save_url,
                'post_details_en' => $request->post_details_en,
                'post_details_bn' => $request->post_details_bn,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('list.post')->with($notification);
        }else{
            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                'post_title_en' => $request->post_title_en,
                'post_title_bn' => $request->post_title_bn,
                'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
                'post_slug_bn' => str_replace(' ', '-',$request->post_title_bn),
                'post_details_en' => $request->post_details_en,
                'post_details_bn' => $request->post_details_bn,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('list.post')->with($notification);
        }



    } // end mehtod

   public function BlogPostDelete($post_id){
       $blog_post = BlogPost::findOrFail($post_id);
       unlink($blog_post->post_image);
       BlogPost::findOrFail($post_id)->delete();

       $notification = array(
           'message' => 'Blog Post Deleted Successfully',
           'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
   }

}
