@extends('layouts.app')

@section('title', 'おもちブログ')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container-top">
        <article>
            <h1 class="article">お問い合わせ</h1>

            <div class="flex-box">
                <div class="contact-form">
                    <form method="post" action="{{ action('ContactController@store')}}">
                        @csrf
                        <ul id="contact-form">
                            <li class="name">
                                <label for="name">お名前</label>
                                <input type="text" name="name" placeholder="山田 太郎" maxlength="255">
                            </li>
                            @error('name')
                            @if ($message === "The name field is required.")
                                <div class="alert alert-danger">必ず入力してください。</div>
                            @elseif ($message === "The name may not be greater than 255 characters.") {
                            <div class="alert alert-danger">255文字以内で入力してください。</div>
                            @endif
                            @enderror
                            <li class="kana">
                                <label for="kana">ふりがな</label>
                                <input type="text" name="kana" placeholder="ヤマダ タロウ" maxlength="255">
                            </li>
                            @error('kana')
                            @if ($message === "The kana may not be greater than 255 characters.") {
                            <div class="alert alert-danger">255文字以内で入力してください。</div>
                            @endif
                            @enderror
                            <li class="email">
                                <label for="email">メールアドレス</label>
                                <input type="text" name="email" placeholder="example.com" maxlength="100">
                            </li>
                            @error('email')
                            @if ($message === "The email may not be greater than 100 characters.") {
                            <div class="alert alert-danger">100文字以内で入力してください。</div>
                            @endif
                            @enderror
                            <li class="detail">
                                <label for="detail" style="margin-bottom: 5px">ご意見・ご要望</label>
                                <TEXTAREA type="text" name="detail" rows="10" cols="80" placeholder="ご意見・ご要望をお聞かせください。"
                                          maxlength="1000"></TEXTAREA>
                            </li>
                            @error('detail')
                            @if ($message === "The detail field is required.")
                                <div class="alert alert-danger">必ず入力してください。</div>
                            @elseif ($message === "The detail may not be greater than 1000 characters.") {
                            <div class="alert alert-danger">1000文字以内で入力してください。</div>
                            @endif
                            @enderror
                            <li>
                                <input id="button" class="header-link" type="submit" name="button" value="送信する">
                            </li>
                        </ul>
                    </form>
                </div>
            </div>

            @if(isset($saveSuccessMessage))
                <div class="flex-box">
                    <div class="contact-form">
                        <strong>{!! nl2br($saveSuccessMessage) !!}</strong><br><br>
                        @foreach($contactContents ?? [] as $key => $contactContent)
                            @if($key === 3 && !empty($contactContent))
                                <strong>{!! nl2br(e($contactContent)) !!}</strong>
                                @break
                            @endif

                            <strong>{{ $contactContent }}</strong><br><br>
                        @endforeach
                    </div>
                </div>
            @endif
        </article>
    </div>
@endsection

@section('footer')
    @parent
@endsection
