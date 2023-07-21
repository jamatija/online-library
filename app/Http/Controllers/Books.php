<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Books extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'pdf' => 'required|string',
            'ISBN' => 'required|string',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        Book::create([
            'title' => $data['title'],
            'page_count' => $data['page_count'],
            'quantity_count' => $data['quantity_count'],
            'rented_count' => $data['rented_count'],
            'body' => $data['body'],
            'year' => $data['year'],
            'pdf' => $data['pdf'],
            'ISBN' => $data['ISBN'],
            'letter_id' => $data['letter_id'],
            'language_id' => $data['language_id'],
            'binding_id' => $data['binding_id'],
            'format_id' => $data['format_id'],
            'publisher_id' => $data['publisher_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'pdf' => 'required|string',
            'ISBN' => 'required|string',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        $book = Book::findOrFail($id);
        $book->update([
            'title' => $data['title'],
            'page_count' => $data['page_count'],
            'quantity_count' => $data['quantity_count'],
            'rented_count' => $data['rented_count'],
            'body' => $data['body'],
            'year' => $data['year'],
            'pdf' => $data['pdf'],
            'ISBN' => $data['ISBN'],
            'letter_id' => $data['letter_id'],
            'language_id' => $data['language_id'],
            'binding_id' => $data['binding_id'],
            'format_id' => $data['format_id'],
            'publisher_id' => $data['publisher_id'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}