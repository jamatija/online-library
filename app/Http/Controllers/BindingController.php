<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Binding;

class BindingController extends Controller
{
    public function index()
    {
        $bindings = Binding::all();
        return view('bindings.index', compact('bindings'));
    }

    public function create()
    {
        return view('bindings.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:bindings',
        ]);

        if ($validator->fails()) {
            return redirect()->route('bindings.create')
                ->withErrors($validator)
                ->withInput();
        }

        Binding::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('bindings.index')
            ->with('success', 'Povez uspješno kreiran.');
    }

    public function show($id)
    {
        $binding = Binding::findOrFail($id);
        return view('bindings.show', compact('binding'));
    }

    public function edit($id)
    {
        $binding = Binding::findOrFail($id);
        return view('bindings.edit', compact('binding'));
    }

    public function update(Request $request, $id)
    {
        $binding = Binding::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                Rule::unique('bindings')->ignore($binding->id),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('bindings.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $binding->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('bindings.index')
            ->with('success', 'Povez uspješno ažuriran.');
    }

    public function destroy($id)
    {
        $binding = Binding::findOrFail($id);
        $binding->delete();

        return redirect()->route('bindings.index')
            ->with('success', 'Povez uspješno obrisan.');
    }
}
