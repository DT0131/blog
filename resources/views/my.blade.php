@extends('layouts.app')

@section('title', 'おもちブログ')

@section('sidebar')
    @parent

    <!--
    <p>ここはメインのサイドバーに追加される</p>
    -->
@endsection

@section('content')
    <div class="container-my">
        <div id="login_link">
            <input name="id" type="hidden" value="1">
            <a href="{{ route('top.index') }}"><img src="/images/bMfx5U0rQhNNLVe1583240244_1583240308.png" alt="" width="40%"></a>
        </div>
        <h1 id="view_count">Page Views {{ count($data) }} !</h1>
    </div>
@endsection
