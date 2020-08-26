@extends('layout')

@section('content')
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{route('blog.slug',$post->slug)}}">
                    {{$post->title}}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
