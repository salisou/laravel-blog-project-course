<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $books = Book::latest()->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'author' => 'required',
            'year'   => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro creato con successo');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'  => 'required',
            'author' => 'required',
            'year'   => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro aggiornato');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Libro eliminato');
    }
}