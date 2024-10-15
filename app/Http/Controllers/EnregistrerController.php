<?php

namespace App\Http\Controllers;

use App\Models\Enregistrer;
use App\Models\Presence;
use App\Models\Employe;
use Illuminate\Http\Request;

class EnregistrerController extends Controller
{
    // Afficher la liste des enregistrements
    public function index()
    {
        $enregistrers = Enregistrer::with('presence', 'employe')->get();
        return view('enregistrers.index', compact('enregistrers'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        $presences = Presence::all();
        $employes = Employe::all();
        return view('enregistrers.create', compact('presences', 'employes'));
    }

    // Stocker un nouvel enregistrement
    public function store(Request $request)
    {
        $request->validate([
            'presence_id' => 'required|exists:presences,id',
            'employe_id' => 'required|exists:employes,id',
            'heure_arrivee' => 'required|date_format:H:i', // Validation pour l'heure d'arrivée
            'heure_depart' => 'nullable|date_format:H:i', // Validation pour l'heure de départ
            'date' => 'required|date',
        ]);

        Enregistrer::create($request->all());

        return redirect()->route('enregistrers.index')->with('status', 'Enregistrement ajouté avec succès');
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $enregistrer = Enregistrer::findOrFail($id);
        $presences = Presence::all();
        $employes = Employe::all();
        return view('enregistrers.edit', compact('enregistrer', 'presences', 'employes'));
    }

    // Mettre à jour un enregistrement existant
    public function update(Request $request, $id)
    {
        $enregistrer = Enregistrer::findOrFail($id);

        $request->validate([
            'presence_id' => 'required|exists:presences,id',
            'employe_id' => 'required|exists:employes,id',
            'heure_arrivee' => 'required|date_format:H:i', // Validation pour l'heure d'arrivée
            'heure_depart' => 'nullable|date_format:H:i', // Validation pour l'heure de départ
            'date' => 'required|date',
        ]);

        $enregistrer->update($request->all());

        return redirect()->route('enregistrers.index')->with('status', 'Enregistrement mis à jour avec succès');
    }

    // Supprimer un enregistrement
    public function destroy($id)
    {
        $enregistrer = Enregistrer::findOrFail($id);
        $enregistrer->delete();

        return redirect()->route('enregistrers.index')->with('status', 'Enregistrement supprimé avec succès');
    }
}
