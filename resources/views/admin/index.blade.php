@extends('layouts.admin')

@section('name', 'index')


@section('content')


    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

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

    <div class="d-flex justify-content-center my-4">
        {!! $posts->links() !!}
    </div>

       

    </div>
@endsection
