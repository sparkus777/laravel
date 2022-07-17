@extends('header')

@section('title')main page @endsection

@section('main_content')
<div class="container">
    @foreach($blog as $el)
    <div class="card mt-5 25">
        <a href="/posts/{{$el->id}}"><h5 class="card-header">{{$el->title}}</h5></a>
        <div class="card-body">
            <p class="card-text">{{$el->content}}</p>
        </div>
        <div class="card-footer">
            <p class="card-text">{{$el->updated_at}}</p>
        </div>
        <a class="btn btn-danger" href="{{ route('post-delete', $el->id)}}">Удалить</a>
        <a class="btn btn-warning" href="{{ route('edit-one', $el->id)}}">Изменить</a>

    </div>

    @endforeach
</div>
@endsection
