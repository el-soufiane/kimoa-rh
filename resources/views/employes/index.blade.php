@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Employés</h5>
            <a href="{{ route('employes.create') }}" class="btn btn-info">Créer un nouvel employé</a>
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
                            <th>#</th>
                            <th>Matricule</th> <!-- Nouvelle colonne pour le matricule -->
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Téléphone</th>
                            <th>Adresse</th>
                            <th>Actions</th> <!-- On affiche moins de champs -->
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($employes as $employe)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $employe->matricule }}</td> <!-- Affichage du matricule -->
                            <td>{{ $employe->nom }}</td>
                            <td>{{ $employe->prenom }}</td>
                            <td>{{ $employe->telephone }}</td>
                            <td>{{ $employe->adresse }}</td>
                            <td>
                                <a href="{{ route('employes.edit', ['id' => $employe->id]) }}" class="btn btn-outline-primary">Modifier</a>
                                <a href="{{ route('employes.destroy', ['id' => $employe->id]) }}" class="btn btn-outline-danger">Supprimer</a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
