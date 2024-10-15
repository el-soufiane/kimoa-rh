@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Salaires</h5>
            <a href="{{ route('salary.create') }}" class="btn btn-info">Ajouter un nouveau salaire</a>
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
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">N°</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Nom Employé</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Heures Travaillées</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Prime</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Total à Payer</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Actions</h6>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($salaries as $salary)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $ide }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $salary->employe->nom }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $salary->heures_travaillees }} h</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $salary->prime ?? 'N/A' }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{ $salary->total_a_payer }} FCFA</h6>
                            </td>
                            <td class="border-bottom-0">
                                <a href="{{ route('salary.imprimer', ['salary' => $salary->id]) }}" class="btn btn-outline-info">Imprimer</a>
                                <a href="{{ route('salary.show', ['salary' => $salary->id]) }}" class="btn btn-outline-primary">Voir</a>
                            </td>
                        </tr>
                        @php
                            $ide++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
