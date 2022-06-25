@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.clinique.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cliniques.update", [$clinique->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.clinique.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $clinique->nom) }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.clinique.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $clinique->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="telephone">{{ trans('cruds.clinique.fields.telephone') }}</label>
                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" type="text" name="telephone" id="telephone" value="{{ old('telephone', $clinique->telephone) }}" required>
                @if($errors->has('telephone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telephone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.telephone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="adresse">{{ trans('cruds.clinique.fields.adresse') }}</label>
                <input class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" type="text" name="adresse" id="adresse" value="{{ old('adresse', $clinique->adresse) }}" required>
                @if($errors->has('adresse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adresse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.adresse_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ville">{{ trans('cruds.clinique.fields.ville') }}</label>
                <input class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" type="text" name="ville" id="ville" value="{{ old('ville', $clinique->ville) }}" required>
                @if($errors->has('ville'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ville') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.ville_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.clinique.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.clinique.fields.photo_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.cliniques.storeMedia') }}',
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
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($clinique) && $clinique->photo)
      var file = {!! json_encode($clinique->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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