<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
</head>
<body>
@section('sidebar')
    <!--
    ここがメインのサイドバー
    -->
@show

<div class="container">
    @yield('content', View::make('my'))
</div>
</body>
</html>
