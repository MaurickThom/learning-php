<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function index(){
        // return "hello world, CategoriesController";
        $categories = Category::all(); // select * from categories
        return view("welcome",["name"=>"thom","categories"=>$categories]);
    }
}
