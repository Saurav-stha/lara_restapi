<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            'image' => 'nullable',
            'author_name' => 'required|string',
            'status' => 'required'
        ]);
        
        if ($validator->fails()){
            return response()->json([
                'msg'=>"All fields are required",
                "err"=>$validator->messages(),
            ], 422);
        }

        if ($req->hasFile('image')) {
            $cloudinaryImage = $req->file('image')->storeOnCloudinary('blogs');
            $url = $cloudinaryImage->getSecurePath();
            $public_id = $cloudinaryImage->getPublicId();
        }else{
            $url = null;
            $public_id = null;

            return response()->json([
                'msg' => "Image is required!",
            ], 422);
        }

        $status = $req->has('status') ? intval($req->input('status')) : 1;

        $new_blog = Blog::create([
            'title'=>$req->title,
            'description'=>$req->description,
            'image_url'=>$url,
            'image_public_id'=>$public_id,
            'author_name'=>$req->author_name,
            'status'=>$status
        ]);

        $blogs = Blog::get();
        $i=0;

        return view('blogs.index', compact('blogs','i'));

        return response()->json([
            'msg' => "Blog created successfully!",
            'data' => $new_blog,
        ]);

    }
    
    public function show(Blog $blog) {
        return new BlogResource($blog);
    }
    
    public function update(Request $request, Blog $blog) {
        // return $request->file('image');
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif,webp,svg,avif'],
            'author_name' => 'required|string',
            'status' => 'required',
        ]);
        
        if ($validator->fails()){
            return response()->json([
                'msg'=>"All fields are required",
                "err"=>$validator->messages(),
            ], 422);
        }

        if ($request->hasFile('image')) {
            if ($blog->image_public_id) {
                Cloudinary::destroy($blog->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('blogs');
            $url = $cloudinaryImage->getSecurePath();
            $public_id = $cloudinaryImage->getPublicId();
        } 


        $blog->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'image_url'=>$url,
            'image_public_id'=>$public_id,
            'author_name'=>$request->author_name,
            'status'=>$request->status,
        ]);

        return view('blogs.show', compact('blog'));
        return response()->json([
            'msg' => "Blog updated successfully!",
            'data' => $blog
        ]);
    }
    public function destroy(Blog $blog) {
        $blog->delete();

        $blogs = Blog::get();$i=0;

        return view('blogs.index', compact('blogs','i'));
    }
}
