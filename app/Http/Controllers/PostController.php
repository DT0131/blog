<?php

namespace App\Http\Controllers;

use App\UserPosts;
use Illuminate\Http\Request;
use App\Articles;

class PostController extends Controller
{
    private const WEEK = ["日", "月", "火", "水", "木", "金", "土"];

    public function post($id)
    {
        $data = [];
        $userPostData = [];
        if (!empty($id)) {
            // modelのインスタンス生成
            $articles = new Articles;

            // 投稿データ取得
            $data = $articles->getArticleData($id);
            // ユーザ投稿データを取得
            $userPostData = $this->getUserPost($id);

            if (strpos($data->detail, '画像2') === false AND strpos($data->detail, '画像3') === false) {
                return view('post',compact('data', 'userPostData'), ['week' => self::WEEK]);
            }

            if (strpos($data->detail, '画像2') !== false) {
                $data->detail = str_replace('画像2', "<img src='".$data->image2."' width='32%'/>", $data->detail);
            }
            if (strpos($data->detail, '画像3') !== false) {
                $data->detail = str_replace('画像3', "<img src='".$data->image3."' width='32%'/>", $data->detail);
            }
        }
        return view('post',compact('data', 'userPostData'), ['week' => self::WEEK]);
    }

    public function store(Request $request)
    {
        if (!empty($request['postId'])) {
            // バリデーションチェック
            $request->validate([
                'name' => ['max:15'],
                'detail' => ['required', 'max:150'],
            ]);

            // modelのインスタンス生成
            $userPost = new UserPosts();
            $userPost->post_id = $request['postId'];
            $userPost->name = $request['name'] ?: '名無し';
            $userPost->detail = $request['detail'];

            $userPost->save();
        }
        return redirect()->action(
            'PostController@post', ['id' => $request['postId']]
        );
    }

    private function getUserPost($postId = '')
    {
        $userPost = new UserPosts();
        return $userPost->getUserPost($postId);
    }
}
