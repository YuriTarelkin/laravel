<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
	{
		$news = app(News::class);

		return view('news.index', [
			'news' => $news->getNews()
		]);
	}

	public function store(Request $request)
    {
			return response()->json(
			$request->only('author', 'email', 'description'), 201
		  );
    }

	public function show(int $id)
	{
		$news = app(News::class);

		return view('news.show', [
			'news' => $news->getNewsById($id)
		]);
	}

	public function getInfo()
	{
		return view('news.getInfo');
	}

	
}
