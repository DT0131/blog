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

        // 投稿日時を取得
        $postedDateList = $this->getPostedDate($data);

        return view('top', compact('data', 'postedDateList'));
    }

    private function getPostedDate($data): array
    {
        $now = new Carbon(Carbon::now());
        $postedDateList = [];
        foreach ($data as $key => $list) {
            if ($now->diffInYears($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInYears($list->created_at).'年前';
            } elseif ($now->diffInMonths($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInMonths($list->created_at).'ヶ月前';
            } elseif ($now->diffInWeeks($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInWeeks($list->created_at).'週間前';
            } elseif ($now->diffInDays($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInDays($list->created_at).'日前';
            } elseif ($now->diffInHours($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInHours($list->created_at).'時間前';
            } elseif ($now->diffInMinutes($list->created_at) !== 0) {
                $postedDateList[$key] = $now->diffInMinutes($list->created_at).'分前';
            } else {
                $postedDateList[$key] = $now->diffInSeconds($list->created_at).'秒前';
            }
        }
        return $postedDateList;
    }
}
