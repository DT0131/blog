@extends('layouts.app')

@section('title', 'おもちブログ')

@section('sidebar')
    @parent
@endsection

@section('content')
    <html>
    <form action="{{ action('ArticleController@store')}}" method="post" enctype="multipart/form-data">
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
        <strong>「画像2」、「画像3」の文字を入力することでその位置に画像を表示できます。</strong>
        <div>
            <label for="message">内容</label>
            <textarea id="detail" name="detail"></textarea>
        </div>
        @error('detail')
        @if ($message === "The detail field is required.")
            <div class="alert alert-danger">必ず入力してください。</div>
        @elseif ($message === "The title may not be greater than 1000 characters.") {
        <div class="alert alert-danger">1000文字以内で入力してください。</div>
        @endif
        @enderror
        <strong>見出し画像を含めて3枚まで投稿できます。</strong>
        <div>
            <label for="image">見出し画像</label>
            <input type="file" id="image1" name="images[1]">
        </div>
        @error('images[1]')
        <div class="alert alert-danger">{{ $message }}</div>
        <p>{{$message}}</p>
        @enderror
        <div>
            <label for="image">画像2</label>
            <input type="file" id="image2" name="images[2]">
        </div>
        @error('images[2]')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div>
            <label for="image">画像3</label>
            <input type="file" id="image3" name="images[3]">
        </div>
        @error('images[3]')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="送信する">
    </form>
    @if(isset($saveSuccessMessage))
        <strong>{{$saveSuccessMessage}}</strong>
    @endif
    </html>
@endsection
