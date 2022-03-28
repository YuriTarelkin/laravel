<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
		return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        return response()->json(
			$request->only('title', 'description'), 201
		  );
    }

  
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
		return view('admin.categories.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}