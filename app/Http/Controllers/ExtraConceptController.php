<?php

namespace App\Http\Controllers;

use App\Models\ExtraConcept;
use Illuminate\Http\Request;

class ExtraConceptController extends Controller
{
    public function index()
    {
        $concepts = ExtraConcept::all();
        return view('extra_concepts.index', compact('concepts'));
    }

    public function create()
    {
        return view('extra_concepts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'concepto' => 'required',
            'valor' => 'required|numeric',
        ]);

        ExtraConcept::create($request->all());
        return redirect()->route('extra_concepts.index')->with('success', 'Concepto creado con éxito');
    }

    public function edit(ExtraConcept $extraConcept)
    {
        return view('extra_concepts.edit', compact('extraConcept'));
    }

    public function update(Request $request, ExtraConcept $extraConcept)
    {
        $request->validate([
            'concepto' => 'required',
            'valor' => 'required|numeric',
        ]);

        $extraConcept->update($request->all());
        return redirect()->route('extra_concepts.index')->with('success', 'Concepto actualizado con éxito');
    }

    public function destroy(ExtraConcept $extraConcept)
    {
        $extraConcept->delete();
        return redirect()->route('extra_concepts.index')->with('success', 'Concepto eliminado con éxito');
    }
}

