@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Créer un Événement</h5>

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
              <form action="{{ route('evenements.store') }}" method="POST">
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
                  <label for="type" class="form-label">Type d'Événement</label>
                  <input type="text" class="form-control" id="type" name="type" placeholder="Suspension, Retraite, etc.">
                </div>

                <div class="mb-3">
                  <label for="date" class="form-label">Date de l'Événement</label>
                  <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="mb-3">
                  <label for="date_reprise" class="form-label">Date de Reprise (si applicable)</label>
                  <input type="date" class="form-control" id="date_reprise" name="date_reprise">
                </div>

                <div class="mb-3">
                  <label for="motif" class="form-label">Motif</label>
                  <textarea class="form-control" id="motif" name="motif" rows="3"></textarea>
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
