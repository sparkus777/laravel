<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>
<body>
<div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex">
        <div class="d-flex">
            @if (!\Illuminate\Support\Facades\Auth::guest())
            <a href="{{route('main_page')}}" class="navbar-brand d-flex">
                <strong>Home</strong>
            </a>

            <a href="{{route('create')}}" class="navbar-brand d-flex">
                <strong>Create</strong>
            </a>
                <a href="{{route('posts')}}" class="navbar-brand d-flex">
                    <strong>All posts</strong>
                </a>
            <a href="{{route('logout')}}" class="navbar-brand d-flex">
                <strong>log out</strong>
            </a>
                <a href="" class="navbar-brand d-flex">
                    <h3> <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></h3>
                </a>
            @endif
            @if (\Illuminate\Support\Facades\Auth::guest())
                <a href="{{route('reg_page')}}" class="navbar-brand d-flex">
                    <strong>Registration</strong>
                </a>
                <a href="{{route('auth_page')}}" class="navbar-brand d-flex">
                        <strong>Authorization</strong>
                </a>
            @endif
        </div>
    </div>
</div>

@yield('main_content')

</body>
</html>
