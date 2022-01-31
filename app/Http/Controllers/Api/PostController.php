<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
  function index(Request $request)
  {

    /*  $posts = Post::all();  */
    $category = $request->query("category");

    $posts = Post::with('category')->with('user')->with('tags');
   
    if ($category) {
      $posts = $posts->where('category_id', $category);
    }
    
    $posts = $posts->paginate(4);

    

    return response()->json($posts);
  }

  public function show($id)
  {
    $post = Post::where("id", $id)->with('category')->with('user')->with('tags')->first();

  

    return response()->json($post);
  }
}
