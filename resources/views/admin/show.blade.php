@extends('layouts.admin')

@section('name', 'Post #' . $post->id)

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-8">
                
                
                <h1 class="text-center mb-5">{{ $post->title }}</h1>
                    <img class="w-50 text-center" src="{{ asset('storage/' . $post->cover_img) }}" alt="post img">

                <div>
                    <p>{!! $post->content !!}</p>

                    <h5>Written by {{ $post->user->name }}</h5>
                    <h6>Category: {{ $post->category->cat_name }}</h6>

                    <div class="mb-5">

                        @foreach ($post->tags as $tag)
                            <span class="badge bg-primary text-white">{{ $tag->tag_name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 d-flex gap-2 justify-content-center align-items-center">
            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}" class="">Back to all posts</a>
            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
            <form class="text-center" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
    </div>
@endsection
