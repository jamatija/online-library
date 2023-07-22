<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Letters;
use App\Models\Languages;
use App\Models\Binding;
use App\Models\Formats;
use App\Models\Publishers;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $letters = Letters::all();
        $languages = Languages::all();
        $bindings = Binding::all();
        $formats = Formats::all();
        $publishers = Publishers::all();
        
        return view('books.create', compact('letters', 'languages', 'bindings', 'formats', 'publishers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'pdf' => 'required|string',
            'ISBN' => 'required|string|unique:books',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }

        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $letters = Letters::all();
        $languages = Languages::all();
        $bindings = Binding::all();
        $formats = Formats::all();
        $publishers = Publishers::all();
        
        return view('books.edit', compact('book', 'letters', 'languages', 'bindings', 'formats', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'pdf' => 'required|string',
            'ISBN' => [
                'required',
                'string',
                Rule::unique('books')->ignore($book->id),
            ],
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
