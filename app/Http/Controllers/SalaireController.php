<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Salaire;
use App\Models\HeuresTravaillees;
use App\Models\Employe;
use Illuminate\Http\Request;
use PDF;

class SalaireController extends Controller
{
    public function index(Request $request)
{
    $query = Salaire::query();

    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->whereHas('employe', function($q) use ($search) {
            $q->where('nom', 'LIKE', "%{$search}%")
              ->orWhere('prenom', 'LIKE', "%{$search}%");
        })
        ->orWhere('mois', 'LIKE', "%{$search}%")
        ->orWhere('salaire', 'LIKE', "%{$search}%");
    }

    $salaires = $query->get();

    return view('salaires.index', compact('salaires'));
}


    public function create()
    {
        $heuresTravaillées = HeuresTravaillees::with('employe')->get();
        return view('salaires.create', compact('heuresTravaillées'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required',
            'mois' => 'required',
        ]);

        $heuresTravaillees = HeuresTravaillees::where('employe_id', $request->employe_id)
            ->where('mois', $request->mois)
            ->first();

        if ($heuresTravaillees) {
            $employe = Employe::find($request->employe_id);
            $salaire = ($heuresTravaillees->heures_retard < 160) ? (160 - $heuresTravaillees->heures_retard) * $employe->taux_horaire : 0;

            Salaire::create([
                'employe_id' => $employe->id,
                'mois' => $request->mois,
                'salaire' => $salaire,
            ]);

            return redirect()->route('salaires.index')->with('status', 'Salaire calculé avec succès.');
        }

        return redirect()->back()->with('error', 'Aucune heure travaillée trouvée pour cet employé pour ce mois.');
    }

    // app/Http/Controllers/PaieController.php



    public function telechargerFichePaie($id, $mois, $annee)
{
    // Récupérer les données de l'employé
    $employe = Employe::findOrFail($id);

    // Récupérer les heures travaillées pour le mois spécifié
    $heuresTravaillees = HeuresTravaillees::where('employe_id', $id)
        ->whereYear('date', $annee)
        ->whereMonth('date', $mois)
        ->first();

    // Si aucune donnée n'est trouvée, on gère cela proprement
    if (!$heuresTravaillees) {
        return redirect()->back()->with('error', 'Données des heures non trouvées pour cet employé pour le mois spécifié.');
    }

    // Récupérer le salaire pour le mois spécifié
    $salaire = Salaire::where('employe_id', $id)
        ->whereYear('date', $annee)
        ->whereMonth('date', $mois)
        ->first();

    if (!$salaire) {
        return redirect()->back()->with('error', 'Données du salaire non trouvées pour cet employé pour le mois spécifié.');
    }

    // Taux horaire de l'employé
    $tauxHoraire = $employe->taux_horaire ?? 0;

    // Définir les heures normales (160 heures)
    $heuresNormales = 160;

    // Récupérer les heures de retard
    $heuresRetard = $heuresTravaillees->heures_retard;

    // Calcul des heures travaillées : heures normales - heures de retard
    $heuresTravailles = $heuresNormales - $heuresRetard;

    // Total à payer est désormais récupéré directement depuis la table salaire
    $totalAPayer = $salaire->montant;

    // Charger la vue PDF avec les données calculées
    $pdf = PDF::loadView('salaires.fiche_paie', compact('employe', 'heuresNormales', 'heuresTravailles', 'heuresRetard', 'tauxHoraire', 'totalAPayer'));

    return $pdf->download('fiche_paie_' . $employe->nom . '.pdf');
}


}

