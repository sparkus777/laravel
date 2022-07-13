@extends('header')

@section('title')main page @endsection

@section('main_content')
{{--<div class="container">--}}
{{--    <?php foreach ($posts as $post) { ?>--}}
{{--    <div class="card mt-5 25">--}}
{{--        <a href="/posts/<?= $post['id'] ?>"><h5 class="card-header"><?= $post['title'] ?></h5></a>--}}
{{--        <div class="card-body">--}}
{{--            <p class="card-text"><?= $post['content']?></p>--}}
{{--        </div>--}}
{{--        <div class="card-footer">--}}
{{--            <p class="card-text"><?= $post['date_created']?></p>--}}
{{--        </div>--}}
{{--        <a class="btn btn-danger" href="/posts/delete/?id=<?= $post['id'] ?>">Удалить</a>--}}
{{--        <a class="btn btn-warning" href="/posts/edit/<?= $post['id'] ?>">Изменить</a>--}}

{{--    </div>--}}

{{--    <?php } ?>--}}
{{--</div>--}}
@endsection
