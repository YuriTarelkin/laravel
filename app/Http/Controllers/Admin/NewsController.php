<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  
    public function index()
    {
		  return view('admin.news.index');
    }


    public function create()
    {
		  return view('admin.news.create');
    }


    public function store(Request $request)
    {
			return response()->json(
			$request->only('title', 'author', 'description'), 201
		  );
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
		  return view('admin.news.edit');
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