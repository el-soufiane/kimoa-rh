@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Renouveler un Contrat</h5>

                @if (session('status'))
                    <div class="alert alert-success"> {{ session('status') }} </div>
                @endif

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <div class="alert alert-danger"> {{ $error }} </div>
                        </li>
                    @endforeach
                </ul>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('contrats.storeRenewal') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Champs caché pour l'employé -->
                            <input type="hidden" name="employe_id" value="{{ $contrat->employe->id }}">

                            <!-- Employé (affichage seulement) -->
                            <div class="mb-3">
                                <label for="employe" class="form-label">Employé</label>
                                <input type="text" class="form-control" id="employe" value="{{ $contrat->employe->nom }}" readonly>
                            </div>

                            <!-- Type de Contrat -->
                            <div class="mb-3">
                                <label for="type_contrat_id" class="form-label">Type de Contrat</label>
                                <select class="form-control" id="type_contrat_id" name="type_contrat_id">
                                    @foreach($typesContrat as $type)
                                        <option value="{{ $type->id }}">{{ $type->libellé }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Date de début -->
                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date de début</label>
                                <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ old('date_debut') }}">
                            </div>

                            <!-- Date de fin -->
                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date de fin</label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ old('date_fin') }}">
                            </div>

                            <!-- Taux horaire -->
                            <div class="mb-3">
                                <label for="taux_horaire" class="form-label">Taux horaire</label>
                                <input type="number" class="form-control" id="taux_horaire" name="taux_horaire" placeholder="Taux horaire" value="{{ old('taux_horaire') }}">
                            </div>

                            <!-- Observation (statut du contrat) -->
                            <div class="mb-3">
                                <label for="observation" class="form-label">Observation</label>
                                <select class="form-control" id="observation" name="observation">
                                    <option value="actif" {{ old('observation') == 'actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="suspendu" {{ old('observation') == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                                    <option value="licencié" {{ old('observation') == 'licencié' ? 'selected' : '' }}>Licencié</option>
                                </select>
                            </div>

                            <!-- Fichier (optionnel) -->
                            <div class="mb-3">
                                <label for="fichier" class="form-label">Fichier (optionnel)</label>
                                <input type="file" class="form-control" id="fichier" name="fichier">
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Renouveler le Contrat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
