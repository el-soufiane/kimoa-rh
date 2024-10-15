@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-semibold mb-0">Liste des Présences</h5>
            <a href="{{ route('presences.create') }}" class="btn btn-info">Créer une nouvelle présence</a>
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
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">N°</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Libellé</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-semibold mb-0 border-bottom border-primary pb-1">Actions</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $ide = 1;
                        @endphp
                        @foreach ($presences as $presence)
                        <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $ide }}</h6></td>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $presence->libelle }}</h6></td>
                            <td class="border-bottom-0">
                                <a href="{{ route('presences.edit', ['id' => $presence->id]) }}" class="btn btn-outline-primary">Modifier</a>
                                <form action="{{ route('presences.destroy', ['id' => $presence->id]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                                </form>
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
