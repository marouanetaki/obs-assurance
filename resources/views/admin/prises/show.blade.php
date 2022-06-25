@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.prise.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prises.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.id') }}
                        </th>
                        <td>
                            {{ $prise->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.beneficiaire') }}
                        </th>
                        <td>
                            {{ $prise->beneficiaire->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.clinique') }}
                        </th>
                        <td>
                            {{ $prise->clinique->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.statut') }}
                        </th>
                        <td>
                            {{ App\Models\Prise::STATUT_RADIO[$prise->statut] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.type_operation') }}
                        </th>
                        <td>
                            {{ $prise->type_operation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.created_by') }}
                        </th>
                        <td>
                            {{ $prise->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.prise.fields.document') }}
                        </th>
                        <td>
                            @if($prise->document)
                                <a href="{{ $prise->document->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $prise->document->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.prises.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection