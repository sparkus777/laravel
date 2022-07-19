@extends('header')

@section('title')Post create @endsection

@section('main_content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container" >
            <form action="store" method="POST">
                @csrf
                <div class="mt-5"><h1>Create your blog</h1></div>
                    <div class="card text-green" style="border-radius: 20px;">
                        <div class="mt-3">
                        <label class="form-label">Title</label>
                        <input name="title" type="text" id="title" class="form-control" >
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                    </div>
                    </div>
                    <div class="mt-3">
                        <input class="btn btn-outline-success btn-sm" type="submit" value="Создать">
                    </div>
                </form>

    </div>

@endsection
