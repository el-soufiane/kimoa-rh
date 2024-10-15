<?php

namespace App\Http\Controllers;

use App\Models\Occuper;
use App\Models\Poste;
use App\Models\Employe;
use Illuminate\Http\Request;

class OccuperController extends Controller
{
    // Affiche la liste des assignations
    public function index()
    {
        $assignations = Occuper::with(['poste', 'employe'])->get();
        return view('occuper.index', compact('assignations'));
    }

    // Affiche le formulaire de création d'une nouvelle assignation
    public function create()
    {
        $postes = Poste::all();
        $employes = Employe::all();
        return view('occuper.create', compact('postes', 'employes'));
    }

    // Enregistre une nouvelle assignation
    public function store(Request $request)
    {
        $request->validate([
            'poste_id' => 'required|exists:postes,id',
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
        ]);

        Occuper::create($request->all());

        return redirect()->route('occuper.index')->with('success', 'Assignation créée avec succès.');
    }

    // Affiche le formulaire de modification d'une assignation
    public function edit($id)
    {
        $assignation = Occuper::findOrFail($id);
        $postes = Poste::all();
        $employes = Employe::all();
        return view('occuper.edit', compact('assignation', 'postes', 'employes'));
    }

    // Met à jour une assignation
    public function update(Request $request, $id)
    {
        $request->validate([
            'poste_id' => 'required|exists:postes,id',
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
        ]);

        $assignation = Occuper::findOrFail($id);
        $assignation->update($request->all());

        return redirect()->route('occuper.index')->with('success', 'Assignation mise à jour avec succès.');
    }

    // Supprime une assignation
    public function destroy($id)
    {
        $assignation = Occuper::findOrFail($id);
        $assignation->delete();

        return redirect()->route('occuper.index')->with('success', 'Assignation supprimée avec succès.');
    }
}

