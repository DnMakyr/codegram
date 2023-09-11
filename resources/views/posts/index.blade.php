@extends('layouts.app')

@section('content')
    <div id="posts-container" class="container pt-5">
        @include('posts.load')
    </div>
@endsection
