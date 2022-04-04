<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scource;
use Illuminate\Http\Request;

class ScourceController extends Controller
{
    public function index()
    {
        return view('admin.scources.index', [
			'scources' => Scource::withCount('news')->paginate(10)
		]);
    }

    public function create()
    {
		return view('admin.scources.create');
    }

    public function store(Request $request)
    {
        $data = $request->only(['name', 'url']);
        $scource = Scource::create($data);
        if($scource) {
			    return redirect()->route('admin.scources.index')
				    ->with('success', 'Запись успешно добавлена');
		}

		return back()->with('error', 'Не удалось добавить запись');

    }

    public function show($id)
    {
        //
    }

    public function edit(Scource $scources)
    {
		  return view('admin.scources.edit', [
			  'scource' => $scource
	  	]);
    }

    public function update(Request $request, Scource $scource)
    {
      $status = $scource->fill($request->only(['name', 'url']))
        ->save();

      if($status) {
        return redirect()->route('admin.scources.index')
          ->with('success', 'Запись успешно обновлена');
		}

	  	return back()->with('error', 'Не удалось обновить запись');

    }

    public function destroy($id)
    {
        //
    }
}
