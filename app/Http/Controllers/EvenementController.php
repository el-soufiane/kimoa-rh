<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Employe;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::with('employe')->get();
        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        $employes = Employe::all(); // Pour sélectionner un employé
        return view('evenements.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type' => 'required|string',
            'date' => 'required|date',
            'date_reprise' => 'nullable|date',
            'motif' => 'nullable|string',
        ]);

        Evenement::create($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès.');
    }

    public function show(Evenement $evenement)
    {
        return view('evenements.show', compact('evenement'));
    }

    public function edit(Evenement $evenement)
    {
        $employes = Employe::all();
        return view('evenements.edit', compact('evenement', 'employes'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type' => 'required|string',
            'date' => 'required|date',
            'date_reprise' => 'nullable|date',
            'motif' => 'nullable|string',
        ]);

        $evenement->update($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès.');
    }
}
