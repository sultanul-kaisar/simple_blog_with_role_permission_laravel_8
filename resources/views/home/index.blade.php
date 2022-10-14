@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="container px-4 py-5" id="featured-3">
                @role('admin')
                <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm float-right">Add New Blog</a>
                @endrole
                @role('author')
                <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm float-right">Add New Blog</a>
                @endrole

                <h2 class="pb-2 border-bottom">Blogs</h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    @foreach($blogs as $blog)
                        <div class="feature col">
                            <h2>{{ $blog->title }}</h2>
                            <p>{{ Str::limit($blog->body, 120) }}</p>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="icon-link">
                                Read More
                                <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                            </a>
                            @role('admin')
                            <a type="btn" class="btn btn-danger btn-sm float-end" href="{{ route('inactive.blog', $blog->id) }}">Hide </a>
                            @endrole
                            @if( $blog->user_id == Auth::user()->id)
                            <a type="btn" class="btn btn-danger btn-sm float-end" href="{{ route('inactive.blog', $blog->id) }}">Hide </a>
                            @endif

                        </div>
                    @endforeach
                </div>
                {!! $blogs->links() !!}
            </div>
        @endauth

        @guest
            <div class="container px-4 py-5" id="featured-3">
                <h2 class="pb-2 border-bottom">Blogs</h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    @foreach($blogs as $blog)
                    <div class="feature col">
                        <h2>{{ $blog->title }}</h2>
                        <p>{{ Str::limit($blog->body, 120) }}</p>
                        <a href="{{ route('blog.details', $blog->id) }}" class="icon-link">
                            Read More
                            <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"/></svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                {!! $blogs->links() !!}
            </div>
        @endguest
    </div>
@endsection
