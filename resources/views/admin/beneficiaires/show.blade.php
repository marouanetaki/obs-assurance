@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.nom') }}
                        </th>
                        <td>
                            {{ $beneficiaire->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.date_naissance') }}
                        </th>
                        <td>
                            {{ $beneficiaire->date_naissance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.lien_parente') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiaire::LIEN_PARENTE_SELECT[$beneficiaire->lien_parente] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.statut') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiaire::STATUT_SELECT[$beneficiaire->statut] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.document') }}
                        </th>
                        <td>
                            @foreach($beneficiaire->document as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.created_by') }}
                        </th>
                        <td>
                            {{ $beneficiaire->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection