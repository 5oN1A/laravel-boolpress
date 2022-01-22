@extends('layouts.admin')

@section('name', 'edit Post')

@section('content')
    <div class="container">
        <h1>Edit post</h1>

        <!--Form  errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
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

            <!--Post Title Field -->

            <div class="mb-3 form-group">
                <label for="field_title" class="form-label">Title</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                    id="field_title" value="{{ $post->title }}">

                @if ($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->get('title')[0] }}
                    </div>
                @endif
            </div>

            <!--Post Content Field -->

            <div class="mb-3 form-group">
                <label for="field_content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                    value="{{ $post->content }}"></textarea>

                @if ($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->get('content')[0] }}
                    </div>
                @endif
            </div>

            <!--Post Category Field -->

            <div class="form-group">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id === $post->category_id) selected @endif>{{ $category->cat_name }}</option>
                    @endforeach
                </select>
            </div>

            <!--Post Tags Checkbox -->

            <div class="form-group">
                @foreach ($tags as $tag)
                    <label>
                        {{ $tag->tag_name }}
                        <input name="tags[]" type="checkbox" value="{{ $tag->id }}" @if ($post->tags->contains($tag)) checked @endif>
                    </label>
                @endforeach
            </div>

                <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary mr-3" type="reset">Go Back</a>
                <button class="btn btn-success" type="submit" value="submit">Edit</button>

        </form>

        <form class="mb-0 mt-3 text-center" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('delete')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
 

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    </div>
@endsection
