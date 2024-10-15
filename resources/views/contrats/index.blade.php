@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Contrats</h5>
            <a href="{{ route('contrats.create') }}" class="btn btn-info">Créer un nouveau contrat</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">N°</th>
                            <th class="border-bottom-0">Employé</th>
                            <th class="border-bottom-0">Type de contrat</th>
                            <th class="border-bottom-0">Date début</th>
                            <th class="border-bottom-0">Date fin</th>
                            <th class="border-bottom-0">Taux horaire</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($contrats as $contrat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contrat->employe->nom }}</td> <!-- Employé associé -->
                            <td>{{ $contrat->typeContrat->libellé }}</td>
                            <td>{{ $contrat->date_debut }}</td>
                            <td>{{ $contrat->date_fin }}</td>
                            <td>{{ $contrat->taux_horaire }}</td>
                            <td>
                                <!-- Bouton Modifier -->
                                <a href="{{ route('contrats.edit', ['id' => $contrat->id]) }}" class="btn btn-outline-primary">Modifier</a>

                                <!-- Bouton Supprimer -->
                                <a href="{{ route('contrats.delete', ['id' => $contrat->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a>

                                <!-- Affichage du bouton Renouveler si le contrat est expiré -->
                                @if ($contrat->date_fin < now()->toDateString())
                                    <a href="{{ route('contrats.renew', ['id' => $contrat->id]) }}" class="btn btn-outline-info">Renouveler</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
