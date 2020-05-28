<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165270103-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-165270103-1');
    </script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
</head>
<body>
@section('header')
    <div id="header-bar">
        <h1 class="site-title-in-header">おもちの毎日</h1>
        <div id="app">
            <Slide right>
                <a href="{{ route('top.index') }}">
                    <span>Home</span>
                </a>
                <a target="_blank" href="https://www.instagram.com/omomaru_no_iru_seikatsu/?hl=ja">
                    <span>Instagram</span>
                </a>
                <a id="contact" href="{{ route('contact.index') }}">
                    <span>Contact</span>
                </a>
            </Slide>
            <div id="page-wrap"></div>
        </div>
        <script src="{{mix('js/app.js')}}"></script>
    </div>
@show

@yield('content')

@section('footer')
    <footer>
        <ul id="footer-menu">
            <li>
                <a href="{{ route('top.index') }}" class="header-link">Home</a>
            </li>
            <li>
                <a target="_blank" href="https://www.instagram.com/omomaru_no_iru_seikatsu/?hl=ja"
                   class="header-link btn-social-long-instagram">
                    <i class="fab fa-instagram"></i> <span>Follow Me</span>
                </a>
            </li>
        </ul>
    </footer>
</body>
</html>
