<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Departement;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        // Récupère tous les employés avec leur département
        $employes = Employe::with('departement')->get();
        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        // Récupération des départements pour les afficher dans le formulaire
        $departements = Departement::all();
        return view('employes.create', compact('departements'));
    }

    public function store(Request $request)
    {
        // Validation des champs requis
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'sexe' => 'required|in:masculin,féminin',
            'situation_matrimoniale' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'bp' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id', // Validation du département
        ]);

        // Générer le matricule automatiquement
        $matricule = Employe::generateMatricule();

        // Créer un nouvel employé avec le matricule généré
        Employe::create(array_merge($request->all(), ['matricule' => $matricule]));

        return redirect()->route('employes.index')->with('success', 'Employé créé avec succès.');
    }

    public function show($id)
    {
        // Affichage de l'employé
        $employe = Employe::with('departement')->findOrFail($id);
        return view('employes.show', compact('employe'));
    }

    public function edit($id)
    {
        // Récupérer l'employé et les départements pour le formulaire d'édition
        $employe = Employe::findOrFail($id);
        $departements = Departement::all();
        return view('employes.edit', compact('employe', 'departements'));
    }

    public function update(Request $request, $id)
    {
        // Validation des champs requis
        $request->validate([
            'matricule' => 'required|unique:employes,matricule,' . $id,
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|string|max:255',
            'sexe' => 'required|in:masculin,féminin',
            'situation_matrimoniale' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'bp' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id', // Validation du département
        ]);

        // Mise à jour de l'employé
        $employe = Employe::findOrFail($id);
        $employe->update($request->all());

        return redirect()->route('employes.index')->with('success', 'Employé mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Suppression de l'employé
        $employe = Employe::findOrFail($id);
        $employe->delete();

        return redirect()->route('employes.index')->with('success', 'Employé supprimé avec succès.');
    }
}
