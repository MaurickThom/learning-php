<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        // return $posts; //json
        return view('blog',["posts"=>$posts]);
        // return view('blog',compact('posts'));
    }

    public function indexSlug(){
        $posts = Post::get();
        return view('blog-slug',["posts"=>$posts]);
    }

    public function show(int $id){
        $post = DB::table("posts")->where('id',$id)->first();
        return view('post',compact('post'));
    }
    public function show_slug(Post $post){
        return view('post',compact('post'));
    }
}
