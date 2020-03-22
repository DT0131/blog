@extends('layouts.app')

@section('title', 'おもちブログ')

@section('sidebar')
    @parent

    <!--
    <p>ここはメインのサイドバーに追加される</p>
    -->
@endsection

@section('content')
    <html>
    <form action="{{ url('/article')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">タイトル</label>
            <input type="text" id="title" name="title">
        </div>
        @error('title')
        @if ($message === "The title field is required.")
            <div class="alert alert-danger">必ず入力してください。</div>
        @elseif ($message === "The title may not be greater than 30 characters.") {
            <div class="alert alert-danger">30文字以内で入力してください。</div>
        @endif
        @enderror
        <div>
            <label for="message">内容</label>
            <textarea id="content" name="content"></textarea>
        </div>
        @error('content')
        @if ($message === "The content field is required.")
            <div class="alert alert-danger">必ず入力してください。</div>
        @elseif ($message === "The title may not be greater than 200 characters.") {
            <div class="alert alert-danger">200文字以内で入力してください。</div>
        @endif
        @enderror
        <div>
            <label for="image">画像</label>
            <input type="file" id="image" name="image">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="送信する">
    </form>
    </html>
@endsection
