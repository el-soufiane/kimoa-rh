@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ajouter des Heures Travaillées</h5>

            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div>
            @endif

            <form action="{{ route('heures_travaillees.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select class="form-select" id="employe_id" name="employe_id">
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="mois" class="form-label">Mois</label>
                    <input type="month" class="form-control" id="mois" name="mois" required>
                </div>

                <div class="mb-3">
                    <label for="heures_retard" class="form-label">Heures de Retard</label>
                    <input type="number" class="form-control" id="heures_retard" name="heures_retard" value="0" min="0">
                </div>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
@endsection
