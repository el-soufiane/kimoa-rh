@extends('master')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Modifier l'Assignation</h5>

            <form action="{{ route('occuper.update', $assignation->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="employe_id" class="form-label">Employé</label>
                    <select name="employe_id" id="employe_id" class="form-control @error('employe_id') is-invalid @enderror">
                        @foreach ($employes as $employe)
                            <option value="{{ $employe->id }}" {{ $assignation->employe_id == $employe->id ? 'selected' : '' }}>
                                {{ $employe->nom }} {{ $employe->prenom }}
                            </option>
                        @endforeach
                    </select>
                    @error('employe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="poste_id" class="form-label">Poste</label>
                    <select name="poste_id" id="poste_id" class="form-control @error('poste_id') is-invalid @enderror">
                        @foreach ($postes as $poste)
                            <option value="{{ $poste->id }}" {{ $assignation->poste_id == $poste->id ? 'selected' : '' }}>
                                {{ $poste->titre }}
                            </option>
                        @endforeach
                    </select>
                    @error('poste_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date Début</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control @error('date_debut') is-invalid @enderror" value="{{ $assignation->date_debut }}">
                    @error('date_debut')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date Fin </label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control @error('date_fin') is-invalid @enderror" value="{{ $assignation->date_fin }}">
                    @error('date_fin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
