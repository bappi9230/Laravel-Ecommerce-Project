<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function blog_post_category(){
        return $this->belongsTo(BlogPostCategory::class,'category_id','id');
    }
}
