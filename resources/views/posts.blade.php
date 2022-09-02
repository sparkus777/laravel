@extends('header')

@section('title')all posts @endsection

@section('main_content')
@if(!$blog->isEmpty())
<div class="container">
    @foreach($blog as $el)
    <div class="card mt-5 25">
        <h3 class="card-header">{{$el->title}}</h3>
        <div class="card-body">
            <p class="card-text">{{$el->content}}</p>
            <p class="card-text" align="right">{{$el->updated_at->locale('uk')->isoFOrmat('LLL')}}</p>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-1"><a class="btn btn-outline-dark btn-sm" href="{{ route('edit', $el->id)}}">Изменить</a></div>
        <div class="col-md-1"><a class="btn btn-outline-danger btn-sm" href="{{ route('delete', $el->id)}}">Удалить</a></div>
    </div>
    @endforeach
</div>
@else
    <a href="{{route('create')}}" class="navbar-brand d-flex">
        <strong>Blog is empty, create the new post</strong>
    </a>
@endif
@endsection
