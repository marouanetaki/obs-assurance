@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.medicament.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.medicaments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.medicament.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medicament.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.medicament.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medicament.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="presentation">{{ trans('cruds.medicament.fields.presentation') }}</label>
                <textarea class="form-control {{ $errors->has('presentation') ? 'is-invalid' : '' }}" name="presentation" id="presentation">{{ old('presentation') }}</textarea>
                @if($errors->has('presentation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presentation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medicament.fields.presentation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prix">{{ trans('cruds.medicament.fields.prix') }}</label>
                <input class="form-control {{ $errors->has('prix') ? 'is-invalid' : '' }}" type="number" name="prix" id="prix" value="{{ old('prix', '') }}" step="0.01">
                @if($errors->has('prix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medicament.fields.prix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="taux">{{ trans('cruds.medicament.fields.taux') }}</label>
                <input class="form-control {{ $errors->has('taux') ? 'is-invalid' : '' }}" type="number" name="taux" id="taux" value="{{ old('taux', '0') }}" step="1" required>
                @if($errors->has('taux'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taux') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.medicament.fields.taux_helper') }}</span>
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