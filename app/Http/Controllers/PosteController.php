<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Afficher la liste des postes.
     */
    public function index()
    {
        // Récupérer tous les postes
        $postes = Poste::all();
        return view('Poste.index', compact('postes'));
    }

    public function dashboard(){
        return view('layouts.dashboard');
    }

    /**
     * Afficher le formulaire de création d'un poste.
     */
    public function create()
    {
        return view('Poste.create');
    }

    /**
     * Enregistrer un nouveau poste.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
        ]);

        // Créer et sauvegarder le poste
        Poste::create([
            'titre' => $request->titre,
            'description' => $request->description,
        ]);

        return redirect()->route('postes.index')->with('status', 'Poste ajouté avec succès');
    }

    /**
     * Afficher le formulaire de modification d'un poste.
     */
    public function edit($id)
    {
        $poste = Poste::findOrFail($id);
        return view('Poste.edit', compact('poste'));
    }

    /**
     * Mettre à jour un poste existant.
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
        ]);

        // Récupérer le poste et le mettre à jour
        $poste = Poste::findOrFail($id);
        $poste->update($request->all());

        return redirect()->route('postes.index')->with('status', 'Poste modifié avec succès');
    }

    /**
     * Supprimer un poste.
     */
    public function destroy($id)
    {
        $poste = Poste::findOrFail($id);
        $poste->delete();

        return redirect()->route('postes.index')->with('status', 'Poste supprimé avec succès');
    }
}
