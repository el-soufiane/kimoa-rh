@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Ajouter un Salaire</h5>

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
              <form action="{{ route('salary.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="employe_id" class="form-label">Employé</label>
                  <select class="form-control" id="employe_id" name="employe_id">
                      @foreach ($employes as $employe)
                          <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="heures_travaillees" class="form-label">Heures Travaillées</label>
                  <input type="number" class="form-control" id="heures_travaillees" name="heures_travaillees" placeholder="Heures travaillées">
                </div>

                <div class="mb-3">
                  <label for="prime" class="form-label">Prime (optionnel)</label>
                  <input type="number" class="form-control" id="prime" name="prime" placeholder="Montant de la prime (facultatif)">
                </div>

                <button type="submit" class="btn btn-outline-primary">Ajouter</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
