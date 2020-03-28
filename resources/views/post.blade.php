@extends('layouts.app')

@section('title', 'おもちブログ')

@section('header')
    @parent
@endsection

@section('content')
<h1 class="article">{{$data->title}}</h1>

<div class="post">
    <p>{!! nl2br($data->content) !!}</p>
{{--    @if(!empty($data->image1))--}}
{{--    <p><img src="{{$data->image1}}" width="32%"/></p>--}}
{{--    @endif--}}
{{--    @if(!empty($data->image2))--}}
{{--        <p><img src="{{$data->image2}}" width="32%"/></p>--}}
{{--    @endif--}}
{{--    @if(!empty($data->image3))--}}
{{--        <p><img src="{{$data->image3}}" width="32%"/></p>--}}
{{--    @endif--}}
</div>
@endsection
@section('footer')
    @parent
@endsection
