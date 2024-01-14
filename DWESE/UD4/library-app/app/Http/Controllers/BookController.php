<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        // Verificar si hay autores disponibles
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return redirect()->route('books.index')->withErrors(['error' => 'Cannot create a book without authors. Please add authors first.']);
        }

        return view('books.create', ['authors' => $authors]);
    }


    public function store(BookRequest $request)
    {
        // Validación ya realizada por BookRequest

        // Lógica para almacenar el nuevo libro
        $book = new Book;
        $book->title = $request->input('title');
        $book->category = $request->input('category');
        $book->description = $request->input('description');
        $book->price = $request->input('price');
        $book->author_id = $request->input('author_id');
        // Asegúrate de tener el modelo Author importado
        // use App\Models\Author;

        // Verifica si el autor existe antes de asignarlo al libro
        if (Author::find($book->author_id)) {
            $book->save();

            // Puedes redirigir a la vista de detalle del libro, por ejemplo
            return redirect()->route('books.index', $book->id);
        } else {
            // Si el autor no existe, puedes manejar esto de alguna manera (por ejemplo, mostrar un mensaje de error)
            return back()->with('error', 'The selected author does not exist.');
        }
    }

    public function show($id)
    {
        // Lógica para mostrar un libro específico
    }

    public function edit($id)
    {
        // Obtén el libro por su ID
        $book = Book::findOrFail($id);

        // Obtén todos los autores
        $authors = Author::all();

        // Puedes pasar los datos a la vista de edición
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookRequest $request, $id)
    {
        // Validación ya realizada por BookRequest

        // Obtén el libro por su ID
        $book = Book::findOrFail($id);

        // Actualiza los datos del libro
        $book->update($request->validated());

        // Redirige de vuelta al índice con un mensaje de éxito
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        // Obtén el libro por su ID
        $book = Book::findOrFail($id);

        // Verifica si el libro tiene alquileres
        $hasRentals = $book->rentals()->exists();

        // Si el libro tiene alquileres, muestra un mensaje de error
        if ($hasRentals) {
            return redirect()->route('books.index')->withErrors(['error' => 'Cannot delete a book with rentals.']);
        }

        // Elimina el libro
        $book->delete();

        // Redirige de vuelta al índice con un mensaje de éxito
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
