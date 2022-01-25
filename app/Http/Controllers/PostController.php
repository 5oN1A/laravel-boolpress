<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function index() {

      /*  $posts = Post::all();  */
        $posts = Post::with('category')->with('user')->with('tags')->paginate(4); 

        return $posts;
      }
}
