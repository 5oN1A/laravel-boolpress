@extends('layouts.admin')

@section('name', 'create New Post')


@section('content')
    <div class="container">
        <h1>New post</h1>

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

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
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
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                    value="{{ old('content') }}"></textarea>
                @if ($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->get('content')[0] }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary mr-3" type="reset">Reset</a>
            <button class="btn btn-success" type="submit">Create</button>
    </div>
    </form>
    </div>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
