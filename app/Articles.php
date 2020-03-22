<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * 投稿データの取得(ページネーション用)
     *
     * @return mixed
     */
    public function getPageViewCountsForAll()
    {
        return Articles::paginate(8);
    }
}
