<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::all();
        return view('presences.index', compact('presences'));
    }

    public function create()
    {
        return view('presences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Presence::create($request->all());

        return redirect()->route('presences.index')->with('success', 'Présence créée avec succès');
    }

    public function show(Presence $presence)
    {
        return view('presences.show', compact('presence'));
    }

    public function edit(Presence $presence)
    {
        return view('presences.edit', compact('presence'));
    }

    public function update(Request $request, Presence $presence)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $presence->update($request->all());

        return redirect()->route('presences.index')->with('success', 'Présence mise à jour avec succès');
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();

        return redirect()->route('presences.index')->with('success', 'Présence supprimée avec succès');
    }
}
