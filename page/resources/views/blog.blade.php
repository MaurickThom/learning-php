@extends('layout')

@section('content')
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{route('blog.show',["id"=>$post->id])}}">
                    {{$post->title}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
