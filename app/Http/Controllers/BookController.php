<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Letters;
use App\Models\Author;
use App\Models\Categories;
use App\Models\Languages;
use App\Models\Binding;
use App\Models\Formats;
use App\Models\Publishers;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('format', 'letter', 'language', 'publisher','binding')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Categories::all();
        $letters = Letters::all();
        $languages = Languages::all();
        $bindings = Binding::all();
        $formats = Formats::all();
        $publishers = Publishers::all();
        
        return view('books.create', compact('authors', 'categories', 'letters', 'languages', 'bindings', 'formats', 'publishers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'ISBN' => 'required|string|unique:books',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'authors.*' => 'nullable|exists:authors,id',
            'categories.*' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }

        $book = Book::create($request->all());

        $book->authors()->attach($request->input('authors'));
        $book->categories()->attach($request->input('categories'));
        
        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspješno dodata.');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $authors = Author::all();
        $categories = Categories::all();
        $book = Book::findOrFail($id);
        $letters = Letters::all();
        $languages = Languages::all();
        $bindings = Binding::all();
        $formats = Formats::all();
        $publishers = Publishers::all();
        
        return view('books.edit', compact('authors', 'categories', 'book', 'letters', 'languages', 'bindings', 'formats', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'ISBN' => ['required', 'string', Rule::unique('books')->ignore($book->id)],
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            'authors.*' => 'nullable|exists:authors,id',
            'categories.*' => 'nullable|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $book->update($request->all());

        $book->authors()->attach($request->input('authors'));
        $book->categories()->attach($request->input('categories'));
        
        return redirect()->route('books.index')
            ->with('success', 'Knjiga je ažurirana');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspješno obrisana.');
    }
}
