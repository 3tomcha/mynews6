<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\NewsHistory;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ('' != $search) {
            $posts = News::where('title', $search)->get();
        } else {
            $posts = News::all();
        }

        return view('admin.news.index', ['posts' => $posts, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image',
        ]);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->body = $validatedData['body'];

        if (isset($validatedData['image'])) {
            $path = $validatedData['image']->store('public/images');
            $news->image_path = basename($path);
        }
        $news->save();

        return redirect('admin/news/create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target_news = News::find($id);

        // 例えば$idが3だったら、そのnews_idである全てのnews_historiesを取得（最新から）
        $target_histories = $target_news->news_histories()->orderBy('updated_at', 'desc')->get();

        return view('admin.news.edit', ['news' => $target_news, 'histories' => $target_histories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $target_news = News::find($id);
        $target_news->title = $validatedData['title'];
        $target_news->body = $validatedData['body'];

        if ('on' == $request->delete) {
            $target_news->image_path = null;
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/images');
            $target_news->image_path = basename($path);
        }

        $target_news->save();

        $news_history = new NewsHistory();
        $news_history->news_id = $target_news->id;
        $news_history->save();

        return redirect('admin/news/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);
    }
}
