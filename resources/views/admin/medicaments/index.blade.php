@extends('layouts.admin')
@section('content')
@can('medicament_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.medicaments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.medicament.title_singular') }}
            </a>
            @can('can_import')
                <button class="btn btn-secondary" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Medicament', 'route' => 'admin.medicaments.parseCsvImport'])
            @endcan
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.medicament.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Medicament">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.medicament.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.medicament.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.medicament.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.medicament.fields.prix') }}
                        </th>
                        <th>
                            {{ trans('cruds.medicament.fields.taux') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicaments as $key => $medicament)
                        <tr data-entry-id="{{ $medicament->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $medicament->id ?? '' }}
                            </td>
                            <td>
                                {{ $medicament->code ?? '' }}
                            </td>
                            <td>
                                {{ $medicament->nom ?? '' }}
                            </td>
                            <td>
                                {{ $medicament->prix ?? '' }}
                            </td>
                            <td>
                                {{ $medicament->taux ?? '' }}
                            </td>
                            <td>
                                @can('medicament_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.medicaments.show', $medicament->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('medicament_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.medicaments.edit', $medicament->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('medicament_delete')
                                    <form action="{{ route('admin.medicaments.destroy', $medicament->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                @endcan --}}

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
@can('medicament_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.medicaments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        let timerInterval
        swal({
            title: '{{ trans('global.datatables.zero_selected') }}',
            timer: 3000,
            icon: 'error',
            timerProgressBar: true,
            willClose: () => {
                clearInterval(timerInterval)
            }
        })
        return
      }

      swal({
            title: '{{ trans('global.areYouSure') }}',
            text: "Une fois supprimé, vous ne pourrez pas le récupérer !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {'x-csrf-token': _token},
                    method: 'POST',
                    url: config.url,
                    data: { ids: ids, _method: 'DELETE' }
                })
                .done(function () { 
                    location.reload()
                    swal("Enregistrement supprimé !", {
                        icon: "success",
                    })
                });
            }
        });
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  });
  let table = $('.datatable-Medicament:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection