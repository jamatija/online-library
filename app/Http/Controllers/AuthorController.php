<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Author;

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
        $validator = Validator::make($request->all(), [
            'nameSurname' => 'required|string',
            // 'photo' => 'required|string',
            'biography' => 'required|string',
            'wikipedia' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('authors.create')
                ->withErrors($validator)
                ->withInput();
        }

        Author::create($request->all());

        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }

    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nameSurname' => 'required|string',
            // 'photo' => 'required|string',
            'biography' => 'required|string',
            'wikipedia' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('authors.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $author->update($request->all());

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully.');
    }
}
