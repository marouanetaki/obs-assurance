@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.prise.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.prises.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="beneficiaire_id">{{ trans('cruds.prise.fields.beneficiaire') }}</label>
                <select class="form-control select2 {{ $errors->has('beneficiaire') ? 'is-invalid' : '' }}" name="beneficiaire_id" id="beneficiaire_id" required>
                    @foreach($beneficiaires as $id => $entry)
                        <option value="{{ $id }}" {{ old('beneficiaire_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('beneficiaire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beneficiaire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prise.fields.beneficiaire_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clinique_id">{{ trans('cruds.prise.fields.clinique') }}</label>
                <select class="form-control select2 {{ $errors->has('clinique') ? 'is-invalid' : '' }}" name="clinique_id" id="clinique_id" required>
                    @foreach($cliniques as $id => $entry)
                        <option value="{{ $id }}" {{ old('clinique_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('clinique'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinique') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prise.fields.clinique_helper') }}</span>
            </div>
            <div class="form-group">
                {{-- <label>{{ trans('cruds.prise.fields.statut') }}</label> --}}
                @foreach(App\Models\Prise::STATUT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('statut') ? 'is-invalid' : '' }}">
                        <input hidden class="form-check-input" type="radio" id="statut_{{ $key }}" name="statut" value="{{ $key }}" {{ old('statut', 'En cours') === (string) $key ? 'checked' : '' }}>
                        {{-- <label class="form-check-label" for="statut_{{ $key }}">{{ $label }}</label> --}}
                    </div>
                @endforeach
                @if($errors->has('statut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prise.fields.statut_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_operation">{{ trans('cruds.prise.fields.type_operation') }}</label>
                <input class="form-control {{ $errors->has('type_operation') ? 'is-invalid' : '' }}" type="text" name="type_operation" id="type_operation" value="{{ old('type_operation', '') }}" required>
                @if($errors->has('type_operation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_operation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prise.fields.type_operation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="document">{{ trans('cruds.prise.fields.document') }}</label>
                <div class="needsclick dropzone {{ $errors->has('document') ? 'is-invalid' : '' }}" id="document-dropzone">
                </div>
                @if($errors->has('document'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.prise.fields.document_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.documentDropzone = {
    url: '{{ route('admin.prises.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="document"]').remove()
      $('form').append('<input type="hidden" name="document" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="document"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($prise) && $prise->document)
      var file = {!! json_encode($prise->document) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="document" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection