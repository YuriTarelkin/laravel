<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
	{
		$category = app(Category::class);

		return view('categories.index', [
			'categories' => $category->getCategories()
		]);
	}
}
