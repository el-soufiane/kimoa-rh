@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Modifier un Événement</h5>

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
              <form action="{{ route('evenements.update', ['id' => $evenement->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="hidden" name="id" value="{{ $evenement->id }}">
                </div>

                <div class="mb-3">
                  <label for="employe_id" class="form-label">Employé</label>
                  <select class="form-control" id="employe_id" name="employe_id">
                    @foreach ($employes as $employe)
                        <option value="{{ $employe->id }}" @if($employe->id == $evenement->employe_id) selected @endif>{{ $employe->nom }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="mb-3">
                  <label for="type" class="form-label">Type d'Événement</label>
                  <input type="text" class="form-control" id="type" name="type" value="{{ $evenement->type }}">
                </div>

                <div class="mb-3">
                  <label for="date" class="form-label">Date de l'Événement</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{ $evenement->date }}">
                </div>

                <div class="mb-3">
                  <label for="date_reprise" class="form-label">Date de Reprise (si applicable)</label>
                  <input type="date" class="form-control" id="date_reprise" name="date_reprise" value="{{ $evenement->date_reprise }}">
                </div>

                <div class="mb-3">
                  <label for="motif" class="form-label">Motif</label>
                  <textarea class="form-control" id="motif" name="motif" rows="3">{{ $evenement->motif }}</textarea>
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
