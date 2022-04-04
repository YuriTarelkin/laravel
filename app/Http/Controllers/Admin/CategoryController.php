<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
			'categories' => Category::withCount('news')->paginate(10)
		]);
    }

    public function create()
    {
		return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'description']);
        $category = Category::create($data);
        if($category) {
			    return redirect()->route('admin.categories.index')
				    ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись');

    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
		  return view('admin.categories.edit', [
			  'category' => $category
	  	]);
    }

    public function update(Request $request, Category $category)
    {
      $status = $category->fill($request->only(['title', 'description']))
        ->save();

      if($status) {
        return redirect()->route('admin.categories.index')
          ->with('success', 'Запись успешно обновлена');
		}

	  	return back()->with('error', 'Не удалось обновить запись');

    }

    public function destroy($id)
    {
        //
    }
}