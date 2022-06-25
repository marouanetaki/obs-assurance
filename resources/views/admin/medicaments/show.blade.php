@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.medicament.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.medicaments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.id') }}
                        </th>
                        <td>
                            {{ $medicament->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.code') }}
                        </th>
                        <td>
                            {{ $medicament->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.nom') }}
                        </th>
                        <td>
                            {{ $medicament->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.presentation') }}
                        </th>
                        <td>
                            {{ $medicament->presentation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.prix') }}
                        </th>
                        <td>
                            {{ $medicament->prix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medicament.fields.taux') }}
                        </th>
                        <td>
                            {{ $medicament->taux }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.medicaments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection