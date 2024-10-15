@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Créer une Présence</h5>

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
              <form action="{{ route('presences.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="libelle" class="form-label">Libellé</label>
                  <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libellé de la présence">
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
