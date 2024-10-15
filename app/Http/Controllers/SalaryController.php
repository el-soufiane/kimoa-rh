<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employe;
use App\Models\Contrat;
use App\Models\Salaries;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    // Afficher la liste des salaires
    public function index()
    {
        $salaries = Salaries::with('employe')->get();
        return view('salary.index', compact('salaries'));
    }

    // Afficher le formulaire pour créer un nouveau salaire
    public function create()
    {
        $employes = Employe::all(); // Récupérer tous les employés
        return view('salary.create', compact('employes'));
    }

    // Enregistrer un nouveau salaire
    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'heures_travaillees' => 'required|integer|min:0',
            'prime' => 'nullable|numeric|min:0',
        ]);

        // Récupérer l'employé et son contrat actif
        $employe = Employe::find($request->employe_id);
        $contrat = Contrat::where('employe_id', $employe->id)->where('observation', 'actif')->first();

        if (!$contrat) {
            return back()->with('error', 'Aucun contrat actif trouvé pour cet employé.');
        }

        // Calculer le total à payer
        $taux_horaire = $contrat->taux_horaire;
        $heures_travaillees = $request->heures_travaillees;
        $prime = $request->prime ?? 0;
        $total_a_payer = ($taux_horaire * $heures_travaillees) + $prime;

        // Enregistrer le salaire
        Salaries::create([
            'employe_id' => $request->employe_id,
            'heures_normales' => 160, // Par défaut
            'heures_travaillees' => $heures_travaillees,
            'prime' => $prime,
            'taux_horaire' => $taux_horaire,
            'total_a_payer' => $total_a_payer,
        ]);

        return redirect()->route('salary.index')->with('success', 'Salaire ajouté avec succès.');
    }

    public function show(Salaries $salary)
    {
        return view('salary.show', compact('salary'));
    }

    public function imprimerFichePaie(Salaries $salary)
    {
        return view('salary.fiche_paie', compact('salary'));
    }

    public function fichePaie($id)
{
    $salarie = Salaries::with('employe.contrats')->findOrFail($id);

    if (!$salarie) {
        return redirect()->back()->with('error', 'Les informations de salaire pour cet employé ne sont pas disponibles.');
    }

    $employe = $salarie->employe;

    if (!$employe) {
        return redirect()->back()->with('error', 'Aucun employé n\'est associé à ce salaire.');
    }

    $contrat = $employe->contrats()->latest()->first();

    if (!$contrat) {
        return redirect()->back()->with('error', 'Aucun contrat trouvé pour cet employé.');
    }
    return view('salary.fiche_paie', compact('salarie', 'employe', 'contrat'));
}


}
