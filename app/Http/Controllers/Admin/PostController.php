<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(3);

        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.create", ["categories" => $categories, "tags" => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|unique:posts,title',
            'content' => 'required',
            'cover_img' => 'file'
        ]);

        $data = $request->all();

        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->category_id = $data['category_id'];
        $newPost->user_id = Auth::user()->id;

        if ($request->file('cover_img')) {
            $newPost->cover_img = Storage::put("posts", $data['cover_img']);
        }


        $newPost->save();
        if (isset($data["tags"])) {
            $newPost->tags()->sync($data["tags"]);
        }

        return redirect()->route('admin.posts.index', $newPost->id)->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.edit', ["post" => $post, "categories" => $categories, "tags" => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $oldImg = $post->cover_img;

        $post->fill($data);

        if ($request->file('cover_img')) {
            if ($oldImg) {
                Storage::delete($oldImg);
            }
            
            $post->cover_img = $request->file('cover_img')->store('posts');
        }


        if (isset($data["tags"])) {
            $post->tags()->sync($data["tags"]);
        } else {
            $post->tags()->detach();
        }

        $post->save();

        return redirect()->route('admin.posts.show', $post->id)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
