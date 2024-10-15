@extends('master')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Créer un Type de Contrat</h5>

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
              <form action="{{ route('type_contrats.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="libellé" class="form-label">Libellé</label>
                  <input type="text" class="form-control" id="libellé" name="libellé" placeholder="Libellé du type de contrat">
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
