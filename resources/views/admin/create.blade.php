@extends('layouts.admin')

@section('name', 'create New Post')


@section('content')
    <div class="container">
        <h2 class="mb-5">New post</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 form-group">
                <label for="field_title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="field_title">
                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->get('title')[0] }}
                    </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="field_cover_img" class="form-label">Cover Image</label>
                <input type="file" class="form-control @error('cover_img') is-invalid @enderror" name="cover_img" id="field_cover_img">
                @if ($errors->has('cover_img'))
                    <div class="invalid-feedback">
                        {{ $errors->get('cover_img')[0] }}
                    </div>
                @endif
            </div>

            <div class="mb-3 form-group">
                <label for="field_content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                    ></textarea>
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

            <div class="mb-3 form-group">
                <div class="form-label">Tags</div>
                @foreach ($tags as $tag)
                    <label>
                        {{ $tag->tag_name }}
                        <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                    </label>
                @endforeach
            </div>


            <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary mr-3" type="reset">Reset</a>
            <button class="btn btn-success" type="submit">Create</button>

        </form>
    </div>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas)</script>
@endsection
