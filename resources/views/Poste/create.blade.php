@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Créer un Poste</h5>

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
              <form action="{{ route('postes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="titre" class="form-label">Titre</label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre du poste">
                </div>

                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du poste"></textarea>
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
