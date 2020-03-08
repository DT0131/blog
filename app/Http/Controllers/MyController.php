<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageViewCounts;

class MyController extends Controller
{
    public function index()
    {
        // modelのインスタンス生成
        $pageViewCount = new PageViewCounts();
        // データ取得
        $data = $pageViewCount->getPageViewCountsForAll();

        return view('my', compact('data'));
    }
}
