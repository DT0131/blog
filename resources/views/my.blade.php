@extends('layouts.app')

@section('title', 'おもちブログ')

@section('sidebar')
    @parent

    <!--
    <p>ここはメインのサイドバーに追加される</p>
    -->
@endsection

@section('content')
    <h1 id="view_count">Page Views {{ count($data) }} !</h1>

    <!--
    <p>ここが本文のコンテンツ</p>
    -->
@endsection
