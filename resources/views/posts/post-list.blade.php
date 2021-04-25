@extends('layout.app')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Post Title</th>
            <th scope="col">Post author</th>
            <th scope="col">Created Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->string}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a class="" href={{route('posts.edit', $post->id)}}>Edit</a>
            </td>
            <td>
                <a class="" href={{route('posts.destroy', $post->id)}}>Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        {{$posts->links()}}
    </table>
@endsection
