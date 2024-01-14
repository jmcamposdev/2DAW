<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalRequest;
use App\Models\Book;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $allUserRentals = auth()->user()->rentals;
        // Filtrar los alquileres que no han sido devueltos
        $userRentals = $allUserRentals->filter(function ($rental) {
            return $rental->return_date === null;
        });
        // Filtrar los alquileres que ya han sido devueltos
        $userReturnedRentals = $allUserRentals->filter(function ($rental) {
            return $rental->return_date !== null;
        });

        return view('dashboard', compact('userRentals', 'userReturnedRentals'));
    }

    public function create()
    {
        // Obtener libros que no están alquilados actualmente
        $availableBooks = Book::whereNotIn('id', function ($query) {
            $query->select('book_id')->from('rentals')->whereNull('return_date');
        })->get();

        if ($availableBooks->isEmpty()) {
            return redirect()->route('dashboard')->withErrors(['error' => 'There are no available books to rent.']);
        }

        return view('rentals.create', ['books' => $availableBooks]);
    }

    public function store(RentalRequest $request)
    {
        $rental = Rental::create([
            'book_id' => $request->input('book_id'),
            'user_id' => auth()->id(),
            'loan_date' => $request->input('loan_date'),
        ]);

        return redirect()->route('rentals.index')->with('success', 'Rental created successfully.');
    }

    public function getOccupiedDates(Request $request)
    {
        $bookId = $request->input('book_id');

        // Lógica para obtener las fechas ocupadas para el libro
        $occupiedDates = Rental::where('book_id', $bookId)->pluck('loan_date')->toArray();

        return response()->json(['occupied_dates' => $occupiedDates]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rental = Rental::findOrFail($id);

        // Other books 
        $otherBooks = Book::whereNotIn('id', function ($query) use ($rental) {
            $query->select('book_id')->from('rentals')->whereNull('return_date')->where('id', '!=', $rental->book_id);
        })->get();

        $currentBook = Book::findOrFail($rental->book_id);


        if ($rental->return_date !== null) {
            return redirect()->route('dashboard')->withErrors(['error' => 'This rental has already been returned.']);
        }

        if ($rental->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->withErrors(['error' => 'You cannot return a book that you did not rent.']);
        }


        return view('rentals.edit', compact('rental', 'otherBooks', 'currentBook'));
    }

    public function update(RentalRequest $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $rental->book_id = $request->input('book_id');
        $rental->loan_date = $request->input('loan_date');
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function returnBook($id)
    {
        $rental = Rental::findOrFail($id);

        $rental->return_date = now();
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Book returned successfully.');
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);

        $rental->delete();

        return redirect()->route('dashboard')->with('success', 'Rental deleted successfully.');
    }


}
