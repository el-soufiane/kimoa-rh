@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier la Permission</h5>

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

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select name="employe_id" id="employe_id" class="form-select" required>
                        <option value="">Sélectionnez un employé</option>
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}" {{ $employe->id == $permission->employe_id ? 'selected' : '' }}>
                                {{ $employe->nom }} {{ $employe->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="libelle" class="form-label">Libellé</label>
                    <select name="libelle" id="libelle" class="form-select" required>
                        <option value="">Sélectionnez une permission</option>
                        <option value="congé" {{ $permission->libelle == 'congé' ? 'selected' : '' }}>Congé</option>
                        <option value="maladie" {{ $permission->libelle == 'maladie' ? 'selected' : '' }}>Maladie</option>
                        <option value="sans solde" {{ $permission->libelle == 'sans solde' ? 'selected' : '' }}>Sans solde</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date Début</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ $permission->date_debut }}" required>
                </div>

                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date Fin </label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ $permission->date_fin }}">
                </div>

                <div class="mb-3">
                    <label for="motif" class="form-label">Motif</label>
                    <textarea name="motif" id="motif" class="form-control" rows="3">{{ $permission->motif }}</textarea>
                </div>

                <button type="submit" class="btn btn-outline-primary">Mettre à jour la permission</button>
            </form>
        </div>
    </div>
</div>
@endsection
