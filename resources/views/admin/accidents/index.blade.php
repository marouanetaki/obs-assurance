@extends('layouts.admin')
@section('content')
@can('accident_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.accidents.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.accident.title_singular') }}
            </a>
            @can('can_import')
                <button class="btn btn-secondary" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Accident', 'route' => 'admin.accidents.parseCsvImport'])
            @endcan
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.accident.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Accident">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.accident.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.accident.fields.created_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.accident.fields.lieu') }}
                        </th>
                        <th>
                            {{ trans('cruds.accident.fields.heure') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accidents as $key => $accident)
                        <tr data-entry-id="{{ $accident->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $accident->id ?? '' }}
                            </td>
                            <td>
                                {{ $accident->created_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $accident->lieu ?? '' }}
                            </td>
                            <td>
                                {{ $accident->heure ?? '' }}
                            </td>
                            <td>
                                @can('accident_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.accidents.show', $accident->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('accident_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.accidents.edit', $accident->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('accident_delete')
                                    <form action="{{ route('admin.accidents.destroy', $accident->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('accident_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.accidents.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-Accident:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection