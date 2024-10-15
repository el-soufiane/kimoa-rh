@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Calculer Salaire</h5>

            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div>
            @endif

            <form action="{{ route('salaires.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select class="form-select" id="employe_id" name="employe_id">
                        @foreach ($heuresTravaillées as $heure)
                            <option value="{{ $heure->employe->id }}">{{ $heure->employe->nom }} {{ $heure->employe->prenom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="mois" class="form-label">Mois</label>
                    <input type="month" class="form-control" id="mois" name="mois" required>
                </div>

                <button type="submit" class="btn btn-primary">Calculer Salaire</button>
            </form>
        </div>
    </div>
</div>
@endsection
