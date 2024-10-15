<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Employe;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('employe')->get();
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $employes = Employe::all(); // Pour la liste déroulante des employés
        return view('permissions.create', compact('employes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'libelle' => 'required|in:congé,maladie,sans solde',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'motif' => 'nullable|string',
        ]);

        Permission::create($request->all());

        return redirect()->route('permissions.index')->with('success', 'Permission créée avec succès.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $employes = Employe::all();
        return view('permissions.edit', compact('permission', 'employes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'libelle' => 'required|in:congé,maladie,sans solde',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'motif' => 'nullable|string',
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('permissions.index')->with('success', 'Permission mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission supprimée avec succès.');
    }
}
