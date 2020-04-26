<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article');
    }

    public function store(Request $request)
    {
        // バリデーションチェック
        $request->validate([
            'title' => ['required', 'max:30'],
            'content' => ['required', 'max:1000'],
        ]);

        // バリデーション成功時はデータの保存
        $articles = new Articles;
        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->creators_ip = $request->ip();

        // S3にファイルをアップロード
        if (!empty($request->images)) {
            foreach ($request->images as $key => $image) {
                var_dump('画像あり');
                if (empty($image)) {
                    continue;
                }

                $path = $image->store('images', 's3');
                $url = Storage::disk('s3')->url($path);

                $imageNumber = "image".$key;
                $articles->$imageNumber = $url;
            }
        }

        // DBにデータ保存
        $articles->save();

        $saveSuccessMessage = '投稿しました。';

        return view('article', compact('saveSuccessMessage'));
    }
}
