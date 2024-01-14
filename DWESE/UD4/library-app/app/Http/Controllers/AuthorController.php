<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
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

    public function store(AuthorRequest $request)
    {
        // Crear un nuevo autor en la base de datos
        Author::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'nationality' => $request->input('nationality'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            // Agrega más campos según tu estructura de datos
        ]);

        // Redireccionar a la lista de autores
        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function show($id)
    {
        // ...
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(AuthorRequest $request, $id)
    {
        // Buscar el autor por ID
        $author = Author::findOrFail($id);

        // Actualizar los datos del autor
        $author->update($request->validated());

        // Redireccionar con un mensaje de éxito
        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        // Verificar si se deben borrar los libros
        if (request()->input('delete_books') === 'true') {
            // Lógica para borrar los libros del autor
            $author->books()->delete();
        }

        // Borrar al autor
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }

    public function hasBooks($authorId)
    {
        $author = Author::find($authorId);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        // Verificar si el autor tiene libros
        $authorHasBooks = $author->books()->exists();

        return response()->json(['hasBooks' => $authorHasBooks]);
    }
}
