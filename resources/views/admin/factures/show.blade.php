@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.factures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.id') }}
                        </th>
                        <td>
                            {{ $facture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.dossier') }}
                        </th>
                        <td>
                            {{ $facture->dossier->num_dossier ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.frais_rembourse') }}
                        </th>
                        <td>
                            {{ $facture->frais_rembourse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.created_by') }}
                        </th>
                        <td>
                            {{ $facture->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.mode_paiement') }}
                        </th>
                        <td>
                            {{ App\Models\Facture::MODE_PAIEMENT_SELECT[$facture->mode_paiement] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.factures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection