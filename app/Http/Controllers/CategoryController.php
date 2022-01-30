<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index() {
        $categories = Category::orderby("cat_name")->get();

        return response()->json($categories);
    }
    function show($categoryId) {
        $category =Category::where("id", $categoryId)->with("posts")->first();
        return $category;
    }
}
