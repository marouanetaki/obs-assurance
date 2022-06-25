@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.facture.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.factures.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="dossier_id">{{ trans('cruds.facture.fields.dossier') }}</label>
                <select class="form-control select2 {{ $errors->has('dossier') ? 'is-invalid' : '' }}" name="dossier_id" id="dossier_id" required>
                    @foreach($dossiers as $id => $entry)
                        <option value="{{ $id }}" {{ old('dossier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dossier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dossier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.dossier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="frais_rembourse">{{ trans('cruds.facture.fields.frais_rembourse') }}</label>
                <input class="form-control {{ $errors->has('frais_rembourse') ? 'is-invalid' : '' }}" type="number" name="frais_rembourse" id="frais_rembourse" value="{{ old('frais_rembourse', '') }}" step="0.01" required>
                @if($errors->has('frais_rembourse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frais_rembourse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.frais_rembourse_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.facture.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.facture.fields.mode_paiement') }}</label>
                <select class="form-control {{ $errors->has('mode_paiement') ? 'is-invalid' : '' }}" name="mode_paiement" id="mode_paiement" required>
                    <option value disabled {{ old('mode_paiement', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Facture::MODE_PAIEMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mode_paiement', 'Virement') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mode_paiement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mode_paiement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.mode_paiement_helper') }}</span>
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