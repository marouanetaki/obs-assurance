@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.medecin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.medecins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.id') }}
                        </th>
                        <td>
                            {{ $medecin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.nom') }}
                        </th>
                        <td>
                            {{ $medecin->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.prenom') }}
                        </th>
                        <td>
                            {{ $medecin->prenom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.specialite') }}
                        </th>
                        <td>
                            {{ $medecin->specialite->libelle ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.adress') }}
                        </th>
                        <td>
                            {{ $medecin->adress }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.medecin.fields.ville') }}
                        </th>
                        <td>
                            {{ $medecin->ville }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.medecins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection