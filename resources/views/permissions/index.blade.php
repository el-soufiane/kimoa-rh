@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Permissions</h5>
            <a href="{{ route('permissions.create') }}" class="btn btn-info">Créer une nouvelle permission</a>
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
                            <th>Libellé</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->employe->nom }} {{ $permission->employe->prenom }}</td>
                            <td>{{ $permission->libelle }}</td>
                            <td>{{ $permission->date_debut }}</td>
                            <td>{{ $permission->date_fin ?? 'En cours' }}</td>
                            <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-outline-primary">Modifier</a>
                                <a href="{{ route('permissions.delete', $permission->id) }}" class="btn btn-outline-danger">Supprimer</a>
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
