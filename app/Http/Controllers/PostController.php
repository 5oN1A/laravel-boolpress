<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function index() {

      /*  $posts = Post::all();  */
        $posts = Post::with('category')->with('user')->with('tags')->paginate(4); 

        return response()->json($posts);
    }

      public function show($id) {
        $post = Post::where("id", $id)->with('category')->with('user')->with('tags')->first();

        return response()->json($post);
      }
}
