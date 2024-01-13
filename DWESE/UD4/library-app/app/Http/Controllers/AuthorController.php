<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        // ...
    }

    public function show($id)
    {
        // ...
    }

    public function edit($id)
    {
        // ...
    }

    public function update(Request $request, $id)
    {
        // ...
    }

    public function destroy($id)
    {
        // ...
    }
}
