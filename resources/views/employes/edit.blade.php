@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier l'Employé</h5>

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
                    <form action="{{ route('employes.update', ['id' => $employe->id]) }}" method="POST" id="employe-form">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="matricule" class="form-label">Matricule</label>
                            <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $employe->matricule }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $employe->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $employe->prenom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date_naissance" class="form-label">Date de Naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $employe->date_naissance }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lieu_naissance" class="form-label">Lieu de Naissance</label>
                            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" value="{{ $employe->lieu_naissance }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="sexe" class="form-label">Sexe</label>
                            <select class="form-select" id="sexe" name="sexe" required>
                                <option value="masculin" {{ $employe->sexe == 'masculin' ? 'selected' : '' }}>Masculin</option>
                                <option value="féminin" {{ $employe->sexe == 'féminin' ? 'selected' : '' }}>Féminin</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="situation_matrimoniale" class="form-label">Situation Matrimoniale</label>
                            <select class="form-select" id="situation_matrimoniale" name="situation_matrimoniale" required>
                                <option value="célibataire" {{ $employe->situation_matrimoniale == 'célibataire' ? 'selected' : '' }}>Célibataire</option>
                                <option value="marié" {{ $employe->situation_matrimoniale == 'marié' ? 'selected' : '' }}>Marié</option>
                                <option value="divorcé" {{ $employe->situation_matrimoniale == 'divorcé' ? 'selected' : '' }}>Divorcé</option>
                                <option value="veuf" {{ $employe->situation_matrimoniale == 'veuf' ? 'selected' : '' }}>Veuf</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $employe->adresse }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="bp" class="form-label">BP</label>
                            <input type="text" class="form-control" id="bp" name="bp" value="{{ $employe->bp }}">
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $employe->telephone }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" value="{{ $employe->qualification }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="departement_id" class="form-label">Département</label>
                            <select class="form-select" id="departement_id" name="departement_id" required>
                                @foreach($departements as $departement)
                                    <option value="{{ $departement->id }}" {{ $employe->departement_id == $departement->id ? 'selected' : '' }}>{{ $departement->libelle }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-outline-primary">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
