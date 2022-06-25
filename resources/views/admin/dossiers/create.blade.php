@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dossier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dossiers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="num_dossier">{{ trans('cruds.dossier.fields.num_dossier') }}</label>
                <input class="form-control {{ $errors->has('num_dossier') ? 'is-invalid' : '' }}" type="text" name="num_dossier" id="num_dossier" value="{{ old('num_dossier', '') }}" required>
                @if($errors->has('num_dossier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_dossier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.num_dossier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="beneficiaire_id">{{ trans('cruds.dossier.fields.beneficiaire') }}</label>
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
                <span class="help-block">{{ trans('cruds.dossier.fields.beneficiaire_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_soins">{{ trans('cruds.dossier.fields.date_soins') }}</label>
                <input class="form-control date {{ $errors->has('date_soins') ? 'is-invalid' : '' }}" type="text" name="date_soins" id="date_soins" value="{{ old('date_soins') }}" required>
                @if($errors->has('date_soins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_soins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.date_soins_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frais_consultation">{{ trans('cruds.dossier.fields.frais_consultation') }}</label>
                <input class="form-control {{ $errors->has('frais_consultation') ? 'is-invalid' : '' }}" type="number" name="frais_consultation" id="frais_consultation" value="{{ old('frais_consultation', '0') }}" step="0.01">
                @if($errors->has('frais_consultation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frais_consultation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.frais_consultation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frais_analyse">{{ trans('cruds.dossier.fields.frais_analyse') }}</label>
                <input class="form-control {{ $errors->has('frais_analyse') ? 'is-invalid' : '' }}" type="number" name="frais_analyse" id="frais_analyse" value="{{ old('frais_analyse', '0') }}" step="0.01">
                @if($errors->has('frais_analyse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frais_analyse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.frais_analyse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frais_pharmacie">{{ trans('cruds.dossier.fields.frais_pharmacie') }}</label>
                <input class="form-control {{ $errors->has('frais_pharmacie') ? 'is-invalid' : '' }}" type="number" name="frais_pharmacie" id="frais_pharmacie" value="{{ old('frais_pharmacie', '0') }}" step="0.01">
                @if($errors->has('frais_pharmacie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('frais_pharmacie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.frais_pharmacie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="medicaments">{{ trans('cruds.dossier.fields.medicament') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('medicaments') ? 'is-invalid' : '' }}" name="medicaments[]" id="medicaments" multiple>
                    @foreach($medicaments as $id => $medicament)
                        <option value="{{ $id }}" {{ in_array($id, old('medicaments', [])) ? 'selected' : '' }}>{{ $medicament }}</option>
                    @endforeach
                </select>
                @if($errors->has('medicaments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('medicaments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.medicament_helper') }}</span>
            </div>
            <div class="form-group">
                {{-- <label>{{ trans('cruds.dossier.fields.statut') }}</label> --}}
                <select hidden class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}" name="statut" id="statut">
                    <option value disabled {{ old('statut', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Dossier::STATUT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('statut', 'Enregisté') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('statut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('statut') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.statut_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.dossier.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('documents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dossier.fields.documents_helper') }}</span>
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
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.dossiers.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($dossier) && $dossier->documents)
      var files = {!! json_encode($dossier->documents) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
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