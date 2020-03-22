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
        $validatedData = $request->validate([
            'title' => ['required', 'max:30'],
            'content' => ['required', 'max:200'],
        ]);

        // S3にファイルをアップロード
        $path = $request->image->store('images', 's3');
        $url = Storage::disk('s3')->url($path);

        // バリデーション成功時はデータの保存
        $articles = new Articles;
        $articles->title = $request->title;
        $articles->content = $request->content;
        $articles->image1 = $url;

        // DBにデータ保存
        $articles->save();
    }
}
