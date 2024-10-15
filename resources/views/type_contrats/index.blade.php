@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Types de Contrat</h5>
            <a href="{{ route('type_contrats.create') }}" class="btn btn-info">Créer un nouveau type de contrat</a>
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
                            <th class="border-bottom-0">Libellé</th>
                            <th class="border-bottom-0">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $ide = 1; @endphp
                        @foreach ($typeContrats as $typeContrat)
                        <tr>
                            <td>{{ $ide++ }}</td>
                            <td>{{ $typeContrat->libellé }}</td>
                            <td>
                                <a href="{{ route('type_contrats.edit', ['id' => $typeContrat->id]) }}" class="btn btn-outline-primary">Modifier</a>
                                <a href="{{ route('type_contrats.delete', ['id' => $typeContrat->id]) }}" class="btn btn-outline-danger">Supprimer</a>
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
