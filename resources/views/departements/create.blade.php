@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Créer un Département</h5>

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

            <form action="{{ route('departements.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="libelle" class="form-label">Libellé</label>
                    <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libellé du département" required>
                </div>

                <button type="submit" class="btn btn-outline-primary">Créer le département</button>
            </form>
        </div>
    </div>
</div>
@endsection
