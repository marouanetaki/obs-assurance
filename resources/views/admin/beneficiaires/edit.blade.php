@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.beneficiaire.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiaires.update", [$beneficiaire->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.beneficiaire.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $beneficiaire->nom) }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaire.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_naissance">{{ trans('cruds.beneficiaire.fields.date_naissance') }}</label>
                <input class="form-control date {{ $errors->has('date_naissance') ? 'is-invalid' : '' }}" type="text" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $beneficiaire->date_naissance) }}" required>
                @if($errors->has('date_naissance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_naissance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaire.fields.date_naissance_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.beneficiaire.fields.lien_parente') }}</label>
                <select class="form-control {{ $errors->has('lien_parente') ? 'is-invalid' : '' }}" name="lien_parente" id="lien_parente" required>
                    <option value disabled {{ old('lien_parente', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Beneficiaire::LIEN_PARENTE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('lien_parente', $beneficiaire->lien_parente) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('lien_parente'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lien_parente') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaire.fields.lien_parente_helper') }}</span>
            </div>
            @can('edit_statut')
                <div class="form-group">
                    <label>{{ trans('cruds.beneficiaire.fields.statut') }}</label>
                    <select class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}" name="statut" id="statut">
                        <option value disabled {{ old('statut', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Beneficiaire::STATUT_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('statut', $beneficiaire->statut) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('statut'))
                        <div class="invalid-feedback">
                            {{ $errors->first('statut') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.beneficiaire.fields.statut_helper') }}</span>
                </div>
            @endcan
            <div class="form-group">
                <label for="document">{{ trans('cruds.beneficiaire.fields.document') }}</label>
                <div class="needsclick dropzone {{ $errors->has('document') ? 'is-invalid' : '' }}" id="document-dropzone">
                </div>
                @if($errors->has('document'))
                    <div class="invalid-feedback">
                        {{ $errors->first('document') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiaire.fields.document_helper') }}</span>
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
    var uploadedDocumentMap = {}
Dropzone.options.documentDropzone = {
    url: '{{ route('admin.beneficiaires.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
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
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($beneficiaire) && $beneficiaire->document)
      var files = {!! json_encode($beneficiaire->document) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
        }
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