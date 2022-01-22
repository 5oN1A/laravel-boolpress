@extends('layouts.admin')

@section('name', 'private area')


@section('content')

<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary my-5" aria-current="page" href="{{ route('admin.posts.create') }}">New Post</a>
            <a class="btn btn-secondary my-5" aria-current="page" href="{{ route('admin.posts.index') }}">Show All Posts</a>
        </div>
    </div>
</div>
@endsection
