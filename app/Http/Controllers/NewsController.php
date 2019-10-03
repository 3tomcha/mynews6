<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $news = News::all();

        if (!empty($news)) {
            $headline = $news->shift();
        }

        return view('index', ['headline' => $headline, 'posts' => $news]);
    }
}
