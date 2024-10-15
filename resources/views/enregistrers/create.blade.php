@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Ajouter un Enregistrement</h5>

            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div>
            @endif

            <ul>
                @foreach ($errors->all() as $error)
                    <li><div class="alert alert-danger"> {{ $error }} </div></li>
                @endforeach
            </ul>

            <form action="{{ route('enregistrers.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select class="form-control" id="employe_id" name="employe_id">
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}">{{ $employe->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="presence_id" class="form-label">Présence</label>
                    <select class="form-control" id="presence_id" name="presence_id">
                        @foreach ($presences as $presence)
                            <option value="{{ $presence->id }}">{{ $presence->libelle }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="heure_arrivee" class="form-label">Heure d'arrivée</label>
                    <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee">
                </div>

                <div class="mb-3">
                    <label for="heure_depart" class="form-label">Heure de départ</label>
                    <input type="time" class="form-control" id="heure_depart" name="heure_depart">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <button type="submit" class="btn btn-success">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
