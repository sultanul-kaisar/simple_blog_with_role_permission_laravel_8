@extends('layouts.app-master')

@section('content')

    <h1 class="mb-3">Blogs</h1>

    <div class="bg-light p-4 rounded">
        <h2>Blogs</h2>
        <div class="lead">
            Manage your blogs here.
            <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm float-right">Add Blog</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th width="3%" colspan="3">Action</th>
            </tr>
            @php($i = 1)
            @foreach ($blogs as $key => $blog)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('blogs.show', $blog->id) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>


    </div>

    <div class="bg-light p-4 rounded">
        <h2>Hidden Blogs</h2>
        <div class="lead">
            Manage your hidden blogs here.
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Name</th>
                <th width="3%" colspan="3">Action</th>
            </tr>
            @php($i = 1)
            @foreach ($hiddenBlogs as $key => $blog)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('active.blog', $blog->id) }}">Active</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>


    </div>
@endsection
