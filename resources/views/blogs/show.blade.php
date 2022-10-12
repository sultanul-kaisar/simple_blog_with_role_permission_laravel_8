@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Show blog</h2>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <section id="blog" class="blog">
                <div class="container" data-aos="fade-up">

                    <div class="row g-5">

                        <div class="col-lg-8">

                            <article class="blog-details">
                                <h2 class="title">{{ $blog->title }}</h2>

                                <div class="row">

                                    <p class="align-items-center">Author :  <strong style="margin-left: 5px"> {{ $blog->user->name }}</strong> |   {{ $blog->created_at->diffForHumans() }}</p>
                                    <p class="align-items-center"></p>
                                </div>

                                <div class="content mb-4">
                                    <p style="text-align: justify">
                                        {{ $blog->body }}
                                    </p>
                                </div>
                            </article><!-- End blog post -->


                            <div class="comments">

                                <h4 class="comments-count mb-4">Comments</h4>

                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div id="comment-1" class="comment">
                                            @foreach($comments as $comment)
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-4" style="margin-bottom: 10px">
                                                            @role('admin')
                                                            <a href="{{ route('inactive.comment', $comment->id) }}" class="btn btn-primary ">Hide</a>
                                                            @endrole
                                                            @if( $blog->user_id == Auth::user()->id)
                                                            <a href="{{ route('inactive.comment', $comment->id) }}" class="btn btn-primary ">Hide</a>
                                                            @endif
                                                            <p style="font-size: 15px; margin-top: 6px" class="mb-3 float-end">{{ $comment->created_at->diffForHumans() }}</p>
                                                            <a class="float-end" style="margin-right: 10px" href="">{{ $comment->name }}</a>

                                                        </h5>
                                                        <p style="text-align: justify-all"> {{ $comment->body }} </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End blog comments -->
                        </div>

                        <div class="col-lg-4">

                            <div class="sidebar">
                                <div class="sidebar-item recent-posts">
                                    <h3 class="sidebar-title">Recent Posts</h3>

                                    <div class="mt-3">

                                        <div class="post-item mt-3">
                                            <div>
                                                @foreach($blogs as $item)
                                                    <h5><a href="{{ route('blogs.show', $item->id) }}">{{ $item->title }}</a></h5>
                                                    <p>{{ $item->user->name }}  | {{ $item->created_at->diffForHumans() }}</p>
                                                @endforeach
                                            </div>
                                        </div><!-- End recent post item-->

                                    </div>

                                </div><!-- End sidebar recent posts-->



                            </div><!-- End Blog Sidebar -->

                        </div>
                    </div>

                </div>

                <div class="reply-form">

                    <h4>Leave a Comment</h4>
                    <form method="POST" action="{{route('store.comment')}}">
                        @csrf
                        <div class="row mb-3">
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                            <div class="col-md-6 form-group">
                                <input name="name" type="text" class="form-control" placeholder="Your Name*">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-group col-md-6">
                                <textarea name="body" class="form-control" placeholder="Your Comment*"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>

                    </form>

                </div>
            </section><!-- End Blog Details Section -->
        </div>



    </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('blogs.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection
