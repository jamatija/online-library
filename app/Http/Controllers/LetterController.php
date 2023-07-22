<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Letters;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letters::all();
        return view('letters.index', compact('letters'));
    }

    public function create()
    {
        return view('letters.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:letters',
        ]);

        if ($validator->fails()) {
            return redirect()->route('letters.create')
                ->withErrors($validator)
                ->withInput();
        }

        Letters::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('letters.index')
            ->with('success', 'Pismo uspješno kreirano.');
    }

    public function show($id)
    {
        $letter = Letters::findOrFail($id);
        return view('letters.show', compact('letter'));
    }

    public function edit($id)
    {
        $letter = Letters::findOrFail($id);
        return view('letters.edit', compact('letter'));
    }

    public function update(Request $request, $id)
    {
        $letter = Letters::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('letters')->ignore($letter->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('letters.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $letter->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('letters.index')
            ->with('success', 'Pismo uspješno ažurirano.');
    }

    public function destroy($id)
    {
        $letter = Letters::findOrFail($id);
        $letter->delete();

        return redirect()->route('letters.index')
            ->with('success', 'Pismo uspješno obrisano.');
    }
}
