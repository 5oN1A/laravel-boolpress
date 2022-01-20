@extends('layouts.admin')

@section('name', 'Post #' . $post->id)


@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        <p>{{ $post->content }}</p>
        
        <h5>Author: {{ $post->user->name }}</h5>
    </div>
@endsection
