@extends('layouts.admin')
@section('content')
@can('medecin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.medecins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.medecin.title_singular') }}
            </a>
            @can('can_import')
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Medecin', 'route' => 'admin.medecins.parseCsvImport'])
            @endcan
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.medecin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Medecin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.prenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.specialite') }}
                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.adress') }}
                        </th>
                        <th>
                            {{ trans('cruds.medecin.fields.ville') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medecins as $key => $medecin)
                        <tr data-entry-id="{{ $medecin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $medecin->id ?? '' }}
                            </td>
                            <td>
                                {{ $medecin->nom ?? '' }}
                            </td>
                            <td>
                                {{ $medecin->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $medecin->specialite->libelle ?? '' }}
                            </td>
                            <td>
                                {{ $medecin->adress ?? '' }}
                            </td>
                            <td>
                                {{ $medecin->ville ?? '' }}
                            </td>
                            <td>
                                @can('medecin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.medecins.show', $medecin->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('medecin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.medecins.edit', $medecin->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                @can('medecin_delete')
                                    <form action="{{ route('admin.medecins.destroy', $medecin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('medecin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.medecins.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Medecin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection