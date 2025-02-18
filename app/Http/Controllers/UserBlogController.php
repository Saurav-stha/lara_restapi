<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Blog;    
use App\Http\Resources\BlogResource;
use App\Models\Genre;

class UserBlogController extends Controller
{
    public function index(){
        $blogs = Blog::get();
        $i=0;

        return view('blogs.index',compact('blogs','i'));
    }

    public function show(Blog $blog){
        return view('blogs.show',compact('blog'));   
    }

    public function edit(Blog $blog) {
        return view('blogs.edit',compact('blog'));
    }
    public function create(){
        $genres = Genre::all();
        return view("blogs.create",compact('genres'));
    }
}
