<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Employe;
use App\Models\TypeContrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContratController extends Controller
{
    public function index()
    {
        $contrats = Contrat::with('employe', 'typeContrat')->get();
        return view('contrats.index', compact('contrats'));
    }

    public function create()
    {
        $employes = Employe::all();
        $typeContrats = TypeContrat::all();
        return view('contrats.create', compact('employes', 'typeContrats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'type_contrat_id' => 'required|exists:type_contrats,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after:date_debut',
            'taux_horaire' => 'required|numeric|min:0',
            'observation' => 'required|in:actif,suspendu,licencié',
            'fichier' => 'nullable|file|mimes:pdf,docx,doc',
        ]);

        $path = $request->file('fichier') ? $request->file('fichier')->store('contrats') : null;

        Contrat::create([
            'employe_id' => $request->employe_id,
            'type_contrat_id' => $request->type_contrat_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'taux_horaire' => $request->taux_horaire,
            'observation' => $request->observation,
            'fichier' => $path,
        ]);

        return redirect()->route('contrats.index')->with('success', 'Contrat créé avec succès.');
    }


        /**
         * Afficher le formulaire de modification d'un contrat.
         */
        public function edit($id)
        {
            $contrat = Contrat::findOrFail($id);
            $employes = Employe::all();
            $typeContrats = TypeContrat::all();
            return view('contrats.edit', compact('contrat', 'employes', 'typeContrats'));
        }

        /**
         * Mettre à jour un contrat existant.
         */
        public function update(Request $request, $id)
        {
            // Validation des données
            $request->validate([
                'employe_id' => 'required',
                'type_contrat_id' => 'required',
                'date_debut' => 'required|date',
                'date_fin' => 'nullable|date',  // date_fin peut être null si c'est un CDI
                'taux_horaire' => 'required|numeric',
                'observation' => 'required',
                'fichier' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',  // fichier optionnel
            ]);

            // Récupérer le contrat et le mettre à jour
            $contrat = Contrat::findOrFail($id);
            $contrat->update($request->except(['fichier']));

            // Gestion du fichier (s'il y a un nouveau fichier téléchargé)
            if ($request->hasFile('fichier')) {
                $fichierPath = $request->file('fichier')->store('contrats');  // Enregistre dans storage/app/contrats
                $contrat->fichier = $fichierPath;
                $contrat->save();
            }

            return redirect()->route('contrats.index')->with('status', 'Contrat modifié avec succès');
        }

    public function destroy(Contrat $contrat)
    {
        if ($contrat->fichier) {
            Storage::delete($contrat->fichier); // Supprimer le fichier
        }

        $contrat->delete();

        return redirect()->route('contrats.index')->with('success', 'Contrat supprimé avec succès.');
    }

    public function renew($id)
    {
        $contrat = Contrat::findOrFail($id);
        $typesContrat = TypeContrat::all();  // Liste des types de contrat

        return view('contrats.renew', compact('contrat', 'typesContrat'));
    }

    /**
     * Enregistrer un nouveau contrat après renouvellement.
     */
    public function storeRenewal(Request $request)
    {
        // Validation des données
        $request->validate([
            'employe_id' => 'required',
            'type_contrat_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'taux_horaire' => 'required|numeric',
        ]);

        // Créer un nouveau contrat
        Contrat::create([
            'employe_id' => $request->employe_id,
            'type_contrat_id' => $request->type_contrat_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'taux_horaire' => $request->taux_horaire,
            'observation' => $request->observation ?? '',
        ]);

        return redirect()->route('contrats.index')->with('status', 'Contrat renouvelé avec succès');
    }
}

