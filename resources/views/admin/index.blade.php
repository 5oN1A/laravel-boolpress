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
                <li class="list-group-item d-flex align-items-center">
                    <div class="flex-grow-1">{{ $post->title }}</div>

                    <div class="d-flex gap-2 align-items-center">
                        <a class="mb-0 mt-3 btn btn-primary" href="{{ route('admin.posts.show', $post->id) }}">Show</a>
                        <a class="mb-0 mt-3 btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                        <form class="mb-0 mt-3 text-center" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

    <div class="d-flex justify-content-center my-4">
        {!! $posts->onEachSide(2)->links() !!}
    </div>

       

    </div>
@endsection
