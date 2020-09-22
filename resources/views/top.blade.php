@extends('layouts.app')

@section('title', 'おもちブログ')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container-top">
        <div id="page" class="hfeed site">
            <div id="hero-header" class="site-hero-section">
                <header id="masthead" class="site-header" role="banner">
                    <div class="inner">

                    </div><!-- .inner -->

                    <article>
                        <h2 class="article">記事一覧</h2>
                        <h3>おもちの日常について投稿します。</h3>

                        @if(!empty($data))
                            <div class="flex-box">
                                @foreach($data as $key => $list)
                                    <div class="flex-item">
                                        <a href="{{ action('PostController@post', $list->id) }}"></a>
                                        <h4><span style="color: black;">タイトル：{{$list->title}}</span></h4>
                                        <p><span style="color: black;">{{$postedDateList[$key]}}</span></p>
                                </div>
                            @endforeach
                            </div>
                        @endif

                    </article>

                    {{ $data->onEachSide(5)->links() }}

                </header><!-- #masthead -->
            </div>
        </div><!-- #page -->

        <!--  -->

    </div>
@endsection
@section('footer')
    @parent
@endsection
