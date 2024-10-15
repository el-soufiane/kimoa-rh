<?php

namespace App\Http\Controllers;

use App\Models\TypeContrat;
use Illuminate\Http\Request;

class TypeContratController extends Controller
{
    public function index()
    {
        $typeContrats = TypeContrat::all();
        return view('type_contrats.index', compact('typeContrats'));
    }

    public function create()
    {
        return view('type_contrats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libellé' => 'required|string|max:255',
        ]);

        TypeContrat::create($request->all());
        return redirect()->route('type_contrats.index')->with('status', 'Type de contrat créé avec succès !');
    }

    public function edit($id)
    {
        $typeContrat = TypeContrat::findOrFail($id);
        return view('type_contrats.edit', compact('typeContrat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libellé' => 'required|string|max:255',
        ]);

        $typeContrat = TypeContrat::findOrFail($id);
        $typeContrat->update($request->all());

        return redirect()->route('type_contrats.index')->with('status', 'Type de contrat mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $typeContrat = TypeContrat::findOrFail($id);
        $typeContrat->delete();

        return redirect()->route('type_contrats.index')->with('status', 'Type de contrat supprimé avec succès !');
    }
}

