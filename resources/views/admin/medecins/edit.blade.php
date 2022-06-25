@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.medecin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.medecins.update", [$medecin->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.medecin.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $medecin->nom) }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medecin.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prenom">{{ trans('cruds.medecin.fields.prenom') }}</label>
                <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" type="text" name="prenom" id="prenom" value="{{ old('prenom', $medecin->prenom) }}" required>
                @if($errors->has('prenom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prenom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medecin.fields.prenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="specialite_id">{{ trans('cruds.medecin.fields.specialite') }}</label>
                <select class="form-control select2 {{ $errors->has('specialite') ? 'is-invalid' : '' }}" name="specialite_id" id="specialite_id" required>
                    @foreach($specialites as $id => $entry)
                        <option value="{{ $id }}" {{ (old('specialite_id') ? old('specialite_id') : $medecin->specialite->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialite'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialite') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medecin.fields.specialite_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adress">{{ trans('cruds.medecin.fields.adress') }}</label>
                <textarea class="form-control {{ $errors->has('adress') ? 'is-invalid' : '' }}" name="adress" id="adress">{{ old('adress', $medecin->adress) }}</textarea>
                @if($errors->has('adress'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adress') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medecin.fields.adress_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ville">{{ trans('cruds.medecin.fields.ville') }}</label>
                <input class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" type="text" name="ville" id="ville" value="{{ old('ville', $medecin->ville) }}" required>
                @if($errors->has('ville'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ville') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medecin.fields.ville_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection