@extends('layouts.admin')

@section('name', 'Post #' . $post->id)

@section('content')

    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <h1>{{ $post->title }}</h1>
        <div>
            <p>{!! $post->content !!}</p>

            <h5>Author: {{ $post->user->name }}</h5>
            <h3 class="text-primary"><span class="font-italic">Category </span>{{ $post->category->cat_name }}</h3>

            <div class="form-group">
                <strong>Tag</strong>
                <br>
                @foreach ($post->tags as $tag)
                    <span class="badge bg-primary text-white">{{ $tag->tag_name }}</span>
                @endforeach
            </div>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="">Back to all posts</a>
    </div>
@endsection
