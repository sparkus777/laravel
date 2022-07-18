<html>
<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex">
        <div class="d-flex">
            <a href="{{route('posts')}}" class="navbar-brand d-flex">
                <strong>Home</strong>
            </a>
            <a href="{{route('create')}}" class="navbar-brand d-flex">
                <strong>Create</strong>
            </a>
        </div>
    </div>
</div>

@yield('main_content')

</body>
</html>
