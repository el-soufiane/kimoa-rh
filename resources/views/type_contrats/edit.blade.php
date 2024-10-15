@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Modifier le contrat</h2>

            <form method="POST" action="{{ route('contrats.update', $contrat->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Employé -->
                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select class="form-control" name="employe_id" required>
                        @foreach($employes as $employe)
                            <option value="{{ $employe->id }}" {{ $contrat->employe_id == $employe->id ? 'selected' : '' }}>{{ $employe->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date de début -->
                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date de début</label>
                    <input type="date" class="form-control" name="date_debut" value="{{ $contrat->date_debut }}" required>
                </div>

                <!-- Date de fin -->
                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" name="date_fin" value="{{ $contrat->date_fin }}">
                </div>

                <!-- Type de contrat -->
                <div class="mb-3">
                    <label for="type_contrat" class="form-label">Type de contrat</label>
                    <select class="form-control" name="type_contrat" required>
                        @foreach($type_contrats as $type)
                            <option value="{{ $type->id }}" {{ $contrat->type_contrat == $type->id ? 'selected' : '' }}>{{ $type->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Taux horaire -->
                <div class="mb-3">
                    <label for="taux_horaire" class="form-label">Taux horaire</label>
                    <input type="number" step="0.01" class="form-control" name="taux_horaire" value="{{ $contrat->taux_horaire }}" required>
                </div>

                <!-- Observation -->
                <div class="mb-3">
                    <label for="observation" class="form-label">Observation</label>
                    <select class="form-control" name="observation" required>
                        <option value="actif" {{ $contrat->observation == 'actif' ? 'selected' : '' }}>Actif</option>
                        <option value="suspendu" {{ $contrat->observation == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                        <option value="licencié" {{ $contrat->observation == 'licencié' ? 'selected' : '' }}>Licencié</option>
                    </select>
                </div>

                <!-- Fichier -->
                <div class="mb-3">
                    <label for="fichier" class="form-label">Fichier</label>
                    <input type="file" class="form-control" name="fichier">
                    @if($contrat->fichier)
                        <p>Fichier actuel : <a href="{{ asset('storage/'.$contrat->fichier) }}" target="_blank">{{ $contrat->fichier }}</a></p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
