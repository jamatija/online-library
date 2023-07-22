<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Categories;
use App\Models\Binding;
use App\Models\Formats;
use App\Models\Letters;
use App\Models\Languages;
use App\Models\Publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Categories::all();
        $bindings = Binding::all();
        $formats = Formats::all();
        $letters = Letters::all();
        $languages = Languages::all();
        $publishers = Publishers::all();

        return view('books.create', compact('authors', 'categories', 'bindings', 'formats', 'letters', 'languages', 'publishers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            // 'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            // 'pdf' => 'required|string',
            'ISBN' => 'required|string|unique:books',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            // 'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
            // 'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }

        $book = new Book($request->except('authors', 'categories'));
        $book->save();

        $book->authors()->attach($request->input('authors'));
        $book->categories()->sync($request->input('categories'));
        $book->genres()->attach($request->input('genres'));
        
        $binding = Binding::find($request->input('binding_id'));
        $format = Formats::find($request->input('format_id'));
        $letter = Letters::find($request->input('letter_id'));
        $language = Languages::find($request->input('language_id'));
        $publisher = Publishers::find($request->input('publisher_id'));
        
        $book->binding()->associate($binding);
        $book->format()->associate($format);
        $book->letter()->associate($letter);
        $book->language()->associate($language);
        $book->publisher()->associate($publisher);

        $book->save();
        
        
        return redirect()->route('books.index')
            ->with('success', 'Knjiga je uspjesno dodata.');
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
        $bindings = Binding::all();
        $formats = Formats::all();
        $letters = Letters::all();
        $languages = Languages::all();
        $publishers = Publishers::all();

        return view('books.edit', compact('book', 'authors', 'categories', 'bindings', 'formats', 'letters', 'languages', 'publishers'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'page_count' => 'required|integer',
            'quantity_count' => 'required|integer',
            // 'rented_count' => 'required|integer',
            'body' => 'required|string',
            'year' => 'required|string',
            'pdf' => 'required|string',
            'ISBN' => 'required|string|unique:books',
            'letter_id' => 'nullable|exists:letters,id',
            'language_id' => 'nullable|exists:languages,id',
            'binding_id' => 'nullable|exists:bindings,id',
            'format_id' => 'nullable|exists:formats,id',
            'publisher_id' => 'nullable|exists:publishers,id',
            // 'authors' => 'required|array',
            'authors.*' => 'exists:authors,id',
            // 'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $book->update($request->except('authors', 'categories'));

        $book->authors()->sync($request->input('authors'));
        $book->categories()->sync($request->input('categories'));
        $book->genres()->sync($request->input('genres'));
        
        $binding = Binding::find($request->input('binding_id'));
        $format = Formats::find($request->input('format_id'));
        $letter = Letters::find($request->input('letter_id'));
        $language = Languages::find($request->input('language_id'));
        $publisher = Publishers::find($request->input('publisher_id'));
        
        $book->binding()->associate($binding);
        $book->format()->associate($format);
        $book->letter()->associate($letter);
        $book->language()->associate($language);
        $book->publisher()->associate($publisher);

        $book->save();
        
        
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        
        $book->authors()->detach();
        $book->categories()->detach();
        $book->genres()->detach();
        
        if ($book->language) {
            $book->language->books()->dissociate();
        }
        if ($book->letter) {
            $book->letter->books()->dissociate();
        }
        if ($book->format) {
            $book->format->books()->dissociate();
        }
        if ($book->publisher) {
            $book->publisher->books()->dissociate();
        }
        if ($book->binding) {
            $book->binding->books()->dissociate();
        }
  
        
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
