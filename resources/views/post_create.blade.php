@extends('header')

@section('title')post create @endsection

@section('main_content')
    <div class="container">
        <form action="post_create" method="POST">
            @csrf
            <div class="mt-5">
                <label class="form-label">Title</label>
                <input name="title" type="text" id="title" class="form-control" >
            </div>
            <div class="mt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </div>
            <div class="mt-3">
                <input class="btn btn-primary" type="submit" value="Создать">
            </div>
        </form>
    </div>

@endsection
