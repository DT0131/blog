@extends('layouts.app')

@section('title', 'おもちブログ')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container-top">
        <article>
            <h1 class="article">お問い合わせ</h1>
            <div class="contact-form" style="width: 98%">
                <h2 style="text-align: center"><br>お問い合わせ内容を受け付けました。<br>ありがとうございました。<br><br></h2>
            </div>
        </article>
    </div>
@endsection

@section('footer')
    @parent
@endsection
