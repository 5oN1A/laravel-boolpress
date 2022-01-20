@extends('layouts.admin')

@section('name', 'edit Post')
    


@section('content')
    <div class="container">
        <h1>Edit post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                Ci sono errori nel form:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3 form-group">
                <label for="field_title" class="form-label">Title</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                    id="field_title">

                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->get('title')[0] }}
                    </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="field_content" class="form-label">Content</label>
                <input type="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                    name="content" id="field_content">

                @if ($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->get('content')[0] }}
                    </div>
                @endif
            </div>

            {{-- <div class="form-group">

                <label class="form-label">Category</label>

                <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                    <option value="travel">
                        Travel</option>
                    <option value="cooking">
                        Cooking</option>
                    <option value="craft">
                        Craft</option>
                </select>

            </div> --}}



      
        <button class="btn btn-secondary" type="reset ">Reset</button>
        <button class="btn btn-success" type="submit">Crea</button>
      </div> 

        </form>

        <form class="mb-0 mt-3 text-center" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Delete This Post">
        </form>


    </div>
@endsection
