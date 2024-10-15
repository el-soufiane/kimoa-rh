@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Assignations de Poste</h5>
            <a href="{{ route('occuper.create') }}" class="btn btn-info">Attribuer un poste</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>#</th>
                            <th>Employé</th>
                            <th>Poste</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($assignations as $assignation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assignation->employe->nom }} {{ $assignation->employe->prenom }}</td>
                            <td>{{ $assignation->poste->titre }}</td>
                            <td>{{ $assignation->date_debut }}</td>
                            <td>{{ $assignation->date_fin ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('occuper.edit', $assignation->id) }}" class="btn btn-outline-primary">Modifier</a>
                                <a href="{{ route('occuper.delete', $assignation->id) }}" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette assignation ?')">Supprimer</a>
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
