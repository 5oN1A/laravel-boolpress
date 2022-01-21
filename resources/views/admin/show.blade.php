@extends('layouts.admin')

@section('name', 'Post #' . $post->id)


@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div>
            <p>{{ $post->content }}</p>

            <h5>Author: {{ $post->user->name }}</h5>
            <h3 class="text-primary"><span class="font-italic">Category </span>{{ $post->category->cat_name }}</h3>
        </div>
    </div>
@endsection
