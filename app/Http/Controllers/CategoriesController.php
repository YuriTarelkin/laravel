<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
	{
		$categories = $this->getCategories();

		return view('categories.index', [
			'categoriesList' => $categories
		]);
	}
}
