@extends('layout')
@section('content')
<nav>
    <a href="{{ route('profile',['id'=>10]) }}">link name</a>
    <a href="/user/10/profile">link </a>
</nav>

@endsection
