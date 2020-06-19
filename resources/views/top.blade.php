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
                                @foreach($data as $list)
                                    <div class="flex-item">
                                        <a href="{{ action('PostController@post', $list->id) }}"></a>
                                        <h4><span style="color: black;">タイトル：{{$list->title}}</span></h4>
                                        @if(!empty($list->image1))
                                            <img src="{{$list->image1}}" width="100%"/>
                                        @endif
                                        @if($now->diffInYears($list->created_at) !== 0)
                                            <p><span
                                                    style="color: black;">{{$now->diffInYears($list->created_at)}}年前</span>
                                            </p>
                                        @elseif($now->diffInWeeks($list->created_at) !== 0)
                                            <p><span
                                                    style="color: black;">{{$now->diffInWeeks($list->created_at)}}週間前</span>
                                            </p>
                                        @elseif($now->diffInDays($list->created_at) !== 0)
                                            <p><span
                                                    style="color: black;">{{$now->diffInDays($list->created_at)}}日前</span>
                                            </p>
                                        @elseif($now->diffInHours($list->created_at) !== 0)
                                        <p><span style="color: black;">{{$now->diffInHours($list->created_at)}}時間前</span></p>
                                    @elseif($now->diffInMinutes($list->created_at) !== 0)
                                        <p><span style="color: black;">{{$now->diffInMinutes($list->created_at)}}分前</span></p>
                                    @else
                                        <p><span style="color: black;">{{$now->diffInSeconds($list->created_at)}}秒前</span></p>
                                    @endif
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
