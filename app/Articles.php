<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * @var mixed
     */
    private $title;
    /**
     * @var mixed
     */
    private $detail;
    /**
     * @var mixed|string|null
     */
    private $creators_ip;

    /**
     * 投稿データの取得(ページネーション用)
     *
     * @return mixed
     */
    public function getPageViewCountsForAll()
    {
        return self::orderBy('created_at', 'desc')->paginate(12);
    }

    public function getArticleData($id)
    {
        return self::where('id', $id)->first();
    }
}
