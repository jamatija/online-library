<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Formats;

class FormatController extends Controller
{
    public function index()
    {
        $formats = Formats::all();
        return view('formats.index', compact('formats'));
    }

    public function create()
    {
        return view('formats.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:formats',
        ]);

        if ($validator->fails()) {
            return redirect()->route('formats.create')
                ->withErrors($validator)
                ->withInput();
        }

        Formats::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('formats.index')
            ->with('success', 'Format uspješno kreiran.');
    }

    public function show($id)
    {
        $format = Formats::findOrFail($id);
        return view('formats.show', compact('format'));
    }

    public function edit($id)
    {
        $format = Formats::findOrFail($id);
        return view('formats.edit', compact('format'));
    }

    public function update(Request $request, $id)
    {
        $formats = Formats::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('formats')->ignore($formats->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('formats.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $formats->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('formats.index')
            ->with('success', 'Format uspješno ažuriran.');
    }

    public function destroy($id)
    {
        $binding = Formats::findOrFail($id);
        $binding->delete();

        return redirect()->route('formats.index')
            ->with('success', 'Format uspješno obrisan.');
    }
}

