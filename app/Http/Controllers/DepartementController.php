<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('departements.index', compact('departements'));
    }

    public function create()
    {
        return view('departements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Departement::create($request->all());
        return redirect()->route('departements.index')->with('status', 'Département créé avec succès!');
    }

    public function edit($id)
{
    $departement = Departement::findOrFail($id);
    return view('departements.edit', compact('departement'));
}


public function update(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'libelle' => 'required|max:255',
    ]);

    // Récupérer le département et le mettre à jour
    $departement = Departement::findOrFail($id);
    $departement->update($request->all());

    // Rediriger vers la liste des départements avec un message de succès
    return redirect()->route('departements.index')->with('status', 'Département modifié avec succès');
}


    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('status', 'Département supprimé avec succès!');
    }
}
