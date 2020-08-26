@extends('layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <h2>{{$post->slug}}</h2>
    <p>{{$post->body}}</p>
@endsection
