<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageViewCounts extends Model
{
    /**
     * @return PageViewCounts[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getPageViewCountsForAll()
    {
        return PageViewCounts::all();
    }
}
