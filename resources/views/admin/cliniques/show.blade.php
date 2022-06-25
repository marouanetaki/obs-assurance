@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinique.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cliniques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.id') }}
                        </th>
                        <td>
                            {{ $clinique->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.nom') }}
                        </th>
                        <td>
                            {{ $clinique->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.email') }}
                        </th>
                        <td>
                            {{ $clinique->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.telephone') }}
                        </th>
                        <td>
                            {{ $clinique->telephone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.adresse') }}
                        </th>
                        <td>
                            {{ $clinique->adresse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.ville') }}
                        </th>
                        <td>
                            {{ $clinique->ville }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinique.fields.photo') }}
                        </th>
                        <td>
                            @if($clinique->photo)
                                <a href="{{ $clinique->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clinique->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cliniques.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection