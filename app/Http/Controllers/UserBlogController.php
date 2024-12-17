<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Resources\BlogResource;

class UserBlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();

        if ($blogs->count() > 0){
            
            return BlogResource::collection($blogs);
        }
        else{
            return response()->json(['msg' => "No Blogs Available!"], 200);
        }
    }
}
