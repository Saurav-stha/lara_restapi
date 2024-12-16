<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
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

    public function store(Request $req) {

        $validator = Validator::make($req->all(),[

            'title' => 'required|string|max:255',
            'description' => 'required',
            'image_url' => 'required|string|max:255',
            'author_name' => 'required|string',
            'status' => 'boolean',
        ]);
        
        if ($validator->fails()){
            return response()->json([
                'msg'=>"All fields are required",
                "err"=>$validator->messages(),
            ], 422);
        }

        $status = $req->has('status') ? $req->input('status') : false;

        $new_blog = Blog::create([
            'title'=>$req->title,
            'description'=>$req->description,
            'image_url'=>$req->image_url,
            'author_name'=>$req->author_name,
            'status'=>$status,
        ]);

        return response()->json([
            'msg' => "Blog created successfully!",
            'data' => $new_blog
        ]);

    }
    public function show(Blog $blog) {
        return new BlogResource($blog);
    }
    public function update(Request $req, Blog $blog) {
        $validator = Validator::make($req->all(),[
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image_url' => 'required|string|max:255',
            'author_name' => 'required|string',
            'status' => 'boolean',
        ]);
        
        if ($validator->fails()){
            return response()->json([
                'msg'=>"All fields are required",
                "err"=>$validator->messages(),
            ], 422);
        }

        $blog->update([
            'title'=>$req->title,
            'description'=>$req->description,
            'image_url'=>$req->image_url,
            'author_name'=>$req->author_name,
            'status'=>$req->status,
        ]);

        return response()->json([
            'msg' => "Blog updated successfully!",
            'data' => $blog
        ]);
    }
    public function destroy() {
        
    }
}
