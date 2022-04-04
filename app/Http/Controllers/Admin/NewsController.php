<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Scource;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
		return view('admin.news.index', [
			'newsList' => News::with('category', 'scource')->paginate(5)
		]);
    }

    public function create()
    {
		return view('admin.news.create', [
			'categories' => Category::select("id", "title")->get(),
			'scources' => Scource::select("id", "name")->get()
		]);
    }

    public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string']
		]);

		$news = News::create($request->only(['category_id', 'scource_id', 'title', 'status',
			'author', 'image', 'description']));
		if($news) {
			return redirect()->route('admin.news.index')
				->with('success', 'Новость была добавлена');
		}

		return back()->with('error', 'Ошибка добавления');
    }

    public function show($id)
    {
        //
    }

    public function edit(News $news)
    {
		return view('admin.news.edit', [
			'news' => $news,
			'categories' => Category::select("id", "title")->get()
		]);
    }

    public function update(Request $request, News $news)
    {
        $status = $news->fill($request->only(['category_id', 'title', 'status',
			'author', 'image', 'description']))->save();

		if($status) {
			return redirect()->route('admin.news.index')
				->with('success', 'Новость была обновлена');
		}

		return back()->with('error', 'Ошибка обновления');

    }

    public function destroy($id)
    {
        //
    }
}