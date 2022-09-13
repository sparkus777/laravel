@extends('header')

@section('title')all posts @endsection

@section('main_content')
@if($posts->isNotEmpty())
<div class="container">
    @foreach($posts as $post)
    <div class="card mt-5 25">
        <div>
            <h4 class="card-header">{{ $post->user()->get(['id', 'name'])->first()->name }}</h4>
        </div>
        <h3 class="card-header">{{$post->title}}</h3>
        <div class="card-body">
            <p class="card-text">{{$post->content}}</p>
            <p class="card-text" align="right">{{$post->updated_at->locale('uk')->isoFOrmat('LLL')}}</p>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-1"><a class="btn btn-outline-dark btn-sm" href="{{ route('edit', $post->id)}}">Изменить</a></div>
        <div class="col-md-1"><a class="btn btn-outline-danger btn-sm" href="{{ route('delete', $post->id)}}">Удалить</a></div>
    </div>
    @endforeach
</div>
@else
    <a href="{{route('create')}}" class="navbar-brand d-flex">
        <strong>Blog is empty, create the new post</strong>
    </a>
@endif
@endsection
