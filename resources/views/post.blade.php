@extends('layouts.app')

@section('title', 'おもちブログ')

@section('header')
    @parent
@endsection

@section('content')
<div class="container">
    <h1 class="article">{{$data->title}}</h1>

    <div class="post">
        <p>{!! nl2br($data->detail) !!}</p>
    </div>
    <div class="user-post">
        <h3>コメント</h3>
        @if(count($userPostData) > 0)
            <ul class="user-post-list" style="list-style: none;">
                @foreach($userPostData as $userPost)
                    <li>{{$loop->iteration}}：<span style="color:#38c172; font-size:18px;">{{$userPost->name}}</span> {{$userPost->created_at->format('Y/m/d').'('.$week[$userPost->created_at->format('w')].') '.$userPost->created_at->format('H:i:s')}} ID:{{$userPost->uuid}}</li>
                    <li>&nbsp;&nbsp;{{$userPost->detail}}</li>
                @endforeach
            </ul>
        @else
            <p>まだコメントはありません。</p>
        @endif
    </div>
    <form class="mt-4" method="post" action="/post">
        @csrf
        <input type="hidden" name="postId" value="{{$data->id}}">
        <div class="form-group">
            <label>名前(15文字以内)</label>
            <input type="text" name="name" class="form-control" placeholder="名無し" maxlength="15">
        </div>
        @error('name')
        @if ($message === "The name may not be greater than 15 characters.")
            <div class="alert alert-danger">名前は15文字以内で入力してください。</div>
        @endif
        @enderror
        <div class="form-group">
            <label style="width: 160px">投稿内容(150文字以内)</label>
            <textarea name="detail" class="form-control" rows="5" cols="40" maxlength="150" required></textarea>
        </div>
        @error('detail')
        @if ($message === "The detail field is required.")
            <div class="alert alert-danger">投稿内容は必ず入力してください。</div>
        @elseif ($message === "The detail may not be greater than 150 characters.")
            <div class="alert alert-danger">投稿内容は150文字以内で入力してください。</div>
        @endif
        @enderror
        <button type="submit">書き込む</button>
    </form>
    <p>※コメントの削除依頼は画面右上のContactフォームからお願い致します。</p>
</div>
@endsection
@section('footer')
    @parent
@endsection
