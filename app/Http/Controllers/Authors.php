<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class Authors extends Controller
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
        $data = $request->validate([
            'nameSurname' => 'required|string',
            'photo' => 'required|string',
            'biography' => 'required|string',
            'wikipedia' => 'required|string',
        ]);

        Author::create($data);

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
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
        $data = $request->validate([
            'nameSurname' => 'required|string',
            'photo' => 'required|string',
            'biography' => 'required|string',
            'wikipedia' => 'required|string',
        ]);

        $author = Author::findOrFail($id);
        $author->update($data);

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}

