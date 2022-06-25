@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.accident.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accidents.update", [$accident->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="lieu">{{ trans('cruds.accident.fields.lieu') }}</label>
                <input class="form-control {{ $errors->has('lieu') ? 'is-invalid' : '' }}" type="text" name="lieu" id="lieu" value="{{ old('lieu', $accident->lieu) }}" required>
                @if($errors->has('lieu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lieu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accident.fields.lieu_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="heure">{{ trans('cruds.accident.fields.heure') }}</label>
                <input class="form-control datetime {{ $errors->has('heure') ? 'is-invalid' : '' }}" type="text" name="heure" id="heure" value="{{ old('heure', $accident->heure) }}" required>
                @if($errors->has('heure'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heure') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accident.fields.heure_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cause">{{ trans('cruds.accident.fields.cause') }}</label>
                <textarea class="form-control {{ $errors->has('cause') ? 'is-invalid' : '' }}" name="cause" id="cause" required>{{ old('cause', $accident->cause) }}</textarea>
                @if($errors->has('cause'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cause') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accident.fields.cause_helper') }}</span>
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