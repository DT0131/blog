<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Support\Carbon;

class TopController extends Controller
{
    public function index()
    {
        // modelのインスタンス生成
        $articles = new Articles;

        // 投稿データ取得
        $data = $articles->getPageViewCountsForAll();

        // 現在日時の取得
        $now = new Carbon(Carbon::now());

        return view('top', compact('data', 'now'));
    }
}
