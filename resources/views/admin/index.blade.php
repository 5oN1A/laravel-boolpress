
@extends('layouts.admin')

@section('name', 'index')


@section('content')
<ul class="list-group">
    @foreach ($posts as $post)
    <li class="list-group-item d-flex justi">
        <div class="flex-grow-1">{{ $post->title }}</div>
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">Show</a>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
        </div>
    </li>

@endforeach
</ul>
@endsection