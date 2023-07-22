<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Languages;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Languages::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:languages',
        ]);

        if ($validator->fails()) {
            return redirect()->route('languages.create')
                ->withErrors($validator)
                ->withInput();
        }

        Languages::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('languages.index')
            ->with('success', 'Jezik uspješno kreiran.');
    }

    public function show($id)
    {
        $language = Languages::findOrFail($id);
        return view('languages.show', compact('language'));
    }

    public function edit($id)
    {
        $language = Languages::findOrFail($id);
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Languages::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('languages')->ignore($language->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('languages.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $language->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('languages.index')
            ->with('success', 'Jezik uspješno ažuriran.');
    }

    public function destroy($id)
    {
        $language = Languages::findOrFail($id);
        $language->delete();

        return redirect()->route('languages.index')
            ->with('success', 'Jezik uspješno obrisan.');
    }
}
