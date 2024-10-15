@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Calculer Salaire</h5>
            <a href="{{ route('salaires.create') }}" class="btn btn-info">Calculer Salaire</a>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('salaires.index') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" name="search" placeholder="Recherche par nom, mois ou salaire">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Mois</th>
                            <th>Salaire</th>
                            <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaires as $index => $salaire)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $salaire->employe->nom }} {{ $salaire->employe->prenom }}</td>
                            <td>{{ $salaire->mois }}</td>
                            <td>{{ $salaire->salaire }} FCFA</td>
                            <td>
                                <a href="{{ route('employes.fiche_paie.pdf', $salaire->id) }}" class="btn btn-primary">Fiche de Paie</a> <!-- Bouton pour la fiche de paie -->
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
