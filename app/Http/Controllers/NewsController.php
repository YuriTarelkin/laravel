<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
	{
		$news = $this->getNews();

		return view('news.index', [
			'newsList' => $news
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
		return view('news.show', [
			'news' => $this->getNews($id)
		]);
	}

	public function getInfo()
	{
		return view('news.getInfo');
	}

	
}
