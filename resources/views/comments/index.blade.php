@extends('layouts.app-master')

@section('content')



    <div class="bg-light p-4 rounded">
        <h1>Comments</h1>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="10%">Comment</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="5%">Status</th>
                <th scope="col" width="5%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td scope="row">{{ $comment->id }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->body }}</td>
                    <td>{{ $comment->deleted_at }}</td>

                    <td>
                        <a href="{{ route('comment.active', $comment->id) }}" class="btn btn-warning btn-sm">Active</a>
                    </td>

                    <td>
                        <a href="{{ route('comment.delete', $comment->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>



    </div>
@endsection
