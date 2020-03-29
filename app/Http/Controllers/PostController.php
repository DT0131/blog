<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;

class PostController extends Controller
{
    public function post(Request $request, $id)
    {
        $data = [];
        if (!empty($request['id'])) {
            // modelのインスタンス生成
            $articles = new Articles;

            // 投稿データ取得
            $data = $articles->getArticleData($request['id']);

            if (strpos($data->content, '画像2') === false AND strpos($data->content, '画像3') === false) {
                return view('post',compact('data'));
            }

            if (strpos($data->content, '画像2') !== false) {
                $data->content = str_replace('画像2', "<img src='".$data->image2."' width='32%'/>", $data->content);
            }
            if (strpos($data->content, '画像3') !== false) {
                $data->content = str_replace('画像3', "<img src='".$data->image3."' width='32%'/>", $data->content);
            }
        }
        return view('post',compact('data'));
    }
}
