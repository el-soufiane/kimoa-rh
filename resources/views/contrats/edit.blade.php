@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Modifier le Contrat</h5>

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
              <form action="{{ route('contrats.update', ['id' => $contrat->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                  <label for="employe_id" class="form-label">Employé</label>
                  <select class="form-control" id="employe_id" name="employe_id">
                    @foreach($employes as $employe)
                      <option value="{{ $employe->id }}" @if($contrat->employe_id == $employe->id) selected @endif>{{ $employe->nom }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="type_contrat_id" class="form-label">Type de Contrat</label>
                  <select class="form-control" id="type_contrat_id" name="type_contrat_id">
                    @foreach($typeContrats as $type)
                      <option value="{{ $type->id }}" @if($contrat->type_contrat_id == $type->id) selected @endif>{{ $type->libellé }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="date_debut" class="form-label">Date de début</label>
                  <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $contrat->date_debut }}">
                </div>

                <div class="mb-3">
                  <label for="date_fin" class="form-label">Date de fin</label>
                  <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $contrat->date_fin }}">
                </div>

                <div class="mb-3">
                  <label for="taux_horaire" class="form-label">Taux horaire</label>
                  <input type="number" class="form-control" id="taux_horaire" name="taux_horaire" value="{{ $contrat->taux_horaire }}">
                </div>

                <div class="mb-3">
                  <label for="observation" class="form-label">Observation</label>
                  <select class="form-control" id="observation" name="observation">
                    <option value="actif" @if($contrat->observation == 'actif') selected @endif>Actif</option>
                    <option value="suspendu" @if($contrat->observation == 'suspendu') selected @endif>Suspendu</option>
                    <option value="licencié" @if($contrat->observation == 'licencié') selected @endif>Licencié</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="fichier" class="form-label">Fichier (optionnel)</label>
                  <input type="file" class="form-control" id="fichier" name="fichier">
                </div>

                <button type="submit" class="btn btn-outline-primary">Modifier</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
