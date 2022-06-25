@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.accident.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accidents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.accident.fields.id') }}
                        </th>
                        <td>
                            {{ $accident->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accident.fields.created_by') }}
                        </th>
                        <td>
                            {{ $accident->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accident.fields.lieu') }}
                        </th>
                        <td>
                            {{ $accident->lieu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accident.fields.heure') }}
                        </th>
                        <td>
                            {{ $accident->heure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.accident.fields.cause') }}
                        </th>
                        <td>
                            {{ $accident->cause }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accidents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection