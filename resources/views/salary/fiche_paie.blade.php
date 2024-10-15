@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Fiche de Paie</h5>

            <table class="table">
                <tr>
                    <th>Matricule</th>
                    <td>{{ $employe->matricule }}</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td>{{ $employe->nom }}</td>
                </tr>
                <tr>
                    <th>Prénom</th>
                    <td>{{ $employe->prenom }}</td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $employe->telephone }}</td>
                </tr>
                <tr>
                    <th>Adresse</th>
                    <td>{{ $employe->adresse }}</td>
                </tr>
                <tr>
                    <th>Taux Horaire</th>
                    <td>{{ $contrat->taux_horaire }} €</td>
                </tr>
                <tr>
                    <th>Heures Travaillées</th>
                    <td>{{ $salarie->heures_travaillees }}</td>
                </tr>
                <tr>
                    <th>Prime</th>
                    <td>{{ $salarie->prime ?? 'Aucune' }} €</td>
                </tr>
                <tr>
                    <th>Total Salaire</th>
                    <td>{{ ($salarie->heures_travaillees * $contrat->taux_horaire) + ($salarie->prime ?? 0) }} €</td>
                </tr>
            </table>

            <a href="{{ route('salary.print', ['id' => $salarie->id]) }}" class="btn btn-primary mt-4">Imprimer la fiche de paie</a>
        </div>
    </div>
</div>
@endsection
