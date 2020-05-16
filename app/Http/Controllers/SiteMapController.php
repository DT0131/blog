<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class SiteMapController extends Controller
{
    public function sitemap()
    {
        $sitemap = App("sitemap");
        $now = Carbon::now();
        $sitemap->add(URL::to('/'), $now, '1.0', 'always');
        $sitemap->add(URL::to('/top'), $now, '1.0', 'always');
        $sitemap->add(URL::to('/contact'), $now, '0.8', 'always');

        $articles = Articles::orderBy('updated_at', 'desc')->get();
        foreach ($articles as $article) {
            $sitemap->add(URL::to('/post/' . $article->id), $article->updated_at, '0.9', 'yearly');
        }

        return $sitemap->render('xml');
    }
}
