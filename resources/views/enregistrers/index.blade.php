@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Enregistrements</h5>
            <a href="{{ route('enregistrers.create') }}" class="btn btn-info">Ajouter un nouvel enregistrement</a>
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
                            <th>Employé</th>
                            <th>Présence</th>
                            <th>Heure d'arrivée</th>
                            <th>Heure de départ</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($enregistrers as $enregistrer)
                        <tr>
                            <td>{{ $enregistrer->id }}</td>
                            <td>{{ $enregistrer->employe->nom }}</td>
                            <td>{{ $enregistrer->presence->libelle }}</td>
                            <td>{{ $enregistrer->heure_arrivee }}</td>
                            <td>{{ $enregistrer->heure_depart }}</td>
                            <td>{{ $enregistrer->date }}</td>
                            <td>
                                <a href="{{ route('enregistrers.edit', $enregistrer->id) }}" class="btn btn-outline-primary">Modifier</a>
                                <form action="{{ route('enregistrers.destroy', $enregistrer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                </form>
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
