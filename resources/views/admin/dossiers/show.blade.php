@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dossier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dossiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.id') }}
                        </th>
                        <td>
                            {{ $dossier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.num_dossier') }}
                        </th>
                        <td>
                            {{ $dossier->num_dossier }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.beneficiaire') }}
                        </th>
                        <td>
                            {{ $dossier->beneficiaire->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.date_soins') }}
                        </th>
                        <td>
                            {{ $dossier->date_soins }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.frais_consultation') }}
                        </th>
                        <td>
                            {{ $dossier->frais_consultation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.frais_analyse') }}
                        </th>
                        <td>
                            {{ $dossier->frais_analyse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.frais_pharmacie') }}
                        </th>
                        <td>
                            {{ $dossier->frais_pharmacie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.medicament') }}
                        </th>
                        <td>
                            @foreach($dossier->medicaments as $key => $medicament)
                                <span class="label label-info">{{ $medicament->nom }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.statut') }}
                        </th>
                        <td>
                            {{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.created_by') }}
                        </th>
                        <td>
                            {{ $dossier->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.documents') }}
                        </th>
                        <td>
                            @foreach($dossier->documents as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dossier.fields.created_at') }}
                        </th>
                        <td>
                            {{ $dossier->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dossiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection