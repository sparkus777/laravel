@extends('header')

@section('title')edit post @endsection

@section('main_content')
    <div class="container">
        <form action="{{route('post-update',$blog->id)}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$blog->id}}">
            <div class="mt-5">
                <label class="form-label">Title</label>
                <input name="title" type="text" class="form-control" value = "{{$blog->title}}">
            </div>
            <div class="mt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="3">{{$blog->content}}"</textarea>
            </div>
            <div class="mt-3">
                <input class="btn btn-primary" type="submit" value="Change">
            </div>

    </form>
    </div>

@endsection
