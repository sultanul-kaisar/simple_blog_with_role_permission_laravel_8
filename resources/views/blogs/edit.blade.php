@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Update blog</h2>
        <div class="lead">
            Edit blog.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ $blog->title }}"
                           type="text"
                           class="form-control"
                           name="title"
                           placeholder="Title" required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea
                        type="text"
                        class="form-control"
                        name="body"
                        placeholder="Body" required>{{ $blog->body }}</textarea>

                    @if ($errors->has('body'))
                        <span class="text-danger text-left">{{ $errors->first('body') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
