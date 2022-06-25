@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.specialite.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.specialites.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="libelle">{{ trans('cruds.specialite.fields.libelle') }}</label>
                <input class="form-control {{ $errors->has('libelle') ? 'is-invalid' : '' }}" type="text" name="libelle" id="libelle" value="{{ old('libelle', '') }}" required>
                @if($errors->has('libelle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('libelle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.specialite.fields.libelle_helper') }}</span>
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