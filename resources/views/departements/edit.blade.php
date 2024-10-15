@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier le Département</h5>

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

            <form action="{{ route('departements.update', ['id' => $departement->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="libelle" class="form-label">Libellé</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $departement->libelle }}" required>
                </div>

                <button type="submit" class="btn btn-outline-primary">Mettre à jour le département</button>
            </form>
        </div>
    </div>
</div>
@endsection
