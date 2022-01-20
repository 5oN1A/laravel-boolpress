@extends('layouts.admin')

@section('name', 'private area')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary my-5" aria-current="page" href="{{ route('admin.posts.create') }}">New Post</a>
            <a class="btn btn-secondary my-5" aria-current="page" href="{{ route('admin.posts.index') }}">Show All Posts</a>
        </div>
    </div>
</div>
@endsection
