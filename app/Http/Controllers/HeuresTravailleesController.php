<?php

namespace App\Http\Controllers;

use App\Models\HeuresTravaillees;
use App\Models\Employe;
use Illuminate\Http\Request;

class HeuresTravailleesController extends Controller
{
    public function index()
    {
        $heuresTravaillées = HeuresTravaillees::with('employe')->get();
        return view('heures_travaillees.index', compact('heuresTravaillées'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('heures_travaillees.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required',
            'mois' => 'required',
            'heures_retard' => 'required|integer|min:0',
        ]);

        HeuresTravaillees::create($request->all());
        return redirect()->route('heures_travaillees.index')->with('status', 'Heures travaillées ajoutées avec succès.');
    }
}
