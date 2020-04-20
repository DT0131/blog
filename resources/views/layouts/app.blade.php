<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
</head>
<body>
@section('header')
    <header>
        <ul id="header-menu">
            <li style="text-align: left">
                <h1 class="site-title-in-header">おもちの毎日</h1>
            </li>
            <li>
                <a href="{{ route('top.index') }}" class="header-link">Home</a>
            </li>
{{--            <li>--}}
{{--                <a href="https://irishpub398141333.wordpress.com/%e3%81%93%e3%81%ae%e3%82%b5%e3%82%a4%e3%83%88%e3%81%ab%e3%81%a4%e3%81%84%e3%81%a6/" class="header-link">このサイトについて</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="https://irishpub398141333.wordpress.com/%e3%81%8a%e5%95%8f%e3%81%84%e5%90%88%e3%82%8f%e3%81%9b/" class="header-link">お問い合わせ</a>--}}
{{--            </li>--}}
            <li>
                <a target="_blank" href="https://www.instagram.com/omochi_no_iru_seikatsu/?hl=ja" class="header-link btn-social-long-instagram">
                    <i class="fab fa-instagram"></i> <span>Follow Me</span>
                </a>
            </li>
        </ul>
    </header>
@show

@yield('content')

@section('footer')
    <footer>
        <ul id="footer-menu">
            <li>
                <a href="{{ route('top.index') }}" class="header-link">Home</a>
            </li>
{{--            <li>--}}
{{--                <a href="https://irishpub398141333.wordpress.com/%e3%81%93%e3%81%ae%e3%82%b5%e3%82%a4%e3%83%88%e3%81%ab%e3%81%a4%e3%81%84%e3%81%a6/" class="header-link">このサイトについて</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="https://irishpub398141333.wordpress.com/%e3%81%8a%e5%95%8f%e3%81%84%e5%90%88%e3%82%8f%e3%81%9b/" class="header-link">お問い合わせ</a>--}}
{{--            </li>--}}
            <li>
                <a target="_blank" href="https://www.instagram.com/omochi_no_iru_seikatsu/?hl=ja" class="header-link btn-social-long-instagram">
                    <i class="fab fa-instagram"></i> <span>Follow Me</span>
                </a>
            </li>
        </ul>
    </footer>
</body>
</html>
