@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Heures Travaillées</h5>
            <a href="{{ route('heures_travaillees.create') }}" class="btn btn-info">Ajouter des Heures</a>
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
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Mois</th>
                            <th>Heures travaillées</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($heuresTravaillées as $index => $heure)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $heure->employe->nom }} {{ $heure->employe->prenom }}</td>
                            <td>{{ $heure->mois }}</td>
                            <td>{{ 160 - $heure->heures_retard }}h</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
