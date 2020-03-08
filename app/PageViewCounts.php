<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageViewCounts extends Model
{
    public function getPageViewCountsForAll()
    {
        return PageViewCounts::all();
    }
}
