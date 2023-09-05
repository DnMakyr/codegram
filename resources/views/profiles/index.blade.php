@extends('layouts.app')

@section('content')
<div class="container   ">
    <div class="row ">
        <div class="col-3 p-5">
            <img src="data:image/jpeg;base64,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" 
            alt="" class="rounded-circle" style="height:160px">
        </div> 
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <btn href="/p/create" class="btn btn-primary btn-sm ">Add New Post</btn>
            </div>
            <div class="d-flex pt-2">
                <div class="pe-3"><strong>153</strong> posts</div>
                <div class="pe-3"><strong>23k</strong> followers</div>
                <div class="pe-3"><strong>212</strong> following</div>
            </div>
            <div class="pt-3 fw-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
        </div>   
    </div> 
    <div class="row pt-4">
        @foreach ($user->posts as $post)
            <div class="col-4">
                <img src="storage/{{ $post->image}}""
                alt="" class="w-100 h-100 pe-2" style="">
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection
