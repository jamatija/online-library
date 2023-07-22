<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Publishers;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publishers::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:publishers',
        ]);

        if ($validator->fails()) {
            return redirect()->route('publishers.create')
                ->withErrors($validator)
                ->withInput();
        }

        Publishers::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('publishers.index')
            ->with('success', 'Izdavač uspešno kreiran.');
    }

    public function show($id)
    {
        $publisher = Publishers::findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }

    public function edit($id)
    {
        $publisher = Publishers::findOrFail($id);
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, $id)
    {
        $publisher = Publishers::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('publishers')->ignore($publisher->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('publishers.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $publisher->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('publishers.index')
            ->with('success', 'Izdavač uspešno ažuriran.');
    }

    public function destroy($id)
    {
        $publisher = Publishers::findOrFail($id);
        $publisher->delete();

        return redirect()->route('publishers.index')
            ->with('success', 'Izdavač uspešno obrisan.');
    }
}
