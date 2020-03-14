<?php

namespace App\Http\Controllers;

use App\PageViewCounts;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index()
    {
        // modelのインスタンス生成
        $pageViewCount = new PageViewCounts();
        // データ取得
        $data = $pageViewCount->getPageViewCountsForAll();
        return view('top');
    }
}
