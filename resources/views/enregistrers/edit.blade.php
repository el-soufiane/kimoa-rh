@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier l'Enregistrement</h5>

            @if (session('status'))
                <div class="alert alert-success"> {{ session('status') }} </div>
            @endif

            <ul>
                @foreach ($errors->all() as $error)
                    <li><div class="alert alert-danger"> {{ $error }} </div></li>
                @endforeach
            </ul>

            <form action="{{ route('enregistrers.update', $enregistrer->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select class="form-control" id="employe_id" name="employe_id">
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}" {{ $employe->id == $enregistrer->employe_id ? 'selected' : '' }}>
                                {{ $employe->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="presence_id" class="form-label">Présence</label>
                    <select class="form-control" id="presence_id" name="presence_id">
                        @foreach ($presences as $presence)
                            <option value="{{ $presence->id }}" {{ $presence->id == $enregistrer->presence_id ? 'selected' : '' }}>
                                {{ $presence->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="heure_arrivee" class="form-label">Heure d'arrivée</label>
                    <input type="time" class="form-control" id="heure_arrivee" name="heure_arrivee" value="{{ old('heure_arrivee', $enregistrer->heure_arrivee) }}">
                </div>

                <div class="mb-3">
                    <label for="heure_depart" class="form-label">Heure de départ</label>
                    <input type="time" class="form-control" id="heure_depart" name="heure_depart" value="{{ old('heure_depart', $enregistrer->heure_depart) }}">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $enregistrer->date) }}">
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('enregistrers.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
