@extends('layouts.admin')
@section('content')
@can('clinique_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cliniques.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clinique.title_singular') }}
            </a>
            @can('can_import')
                <button class="btn btn-secondary" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Clinique', 'route' => 'admin.cliniques.parseCsvImport'])
            @endcan
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clinique.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Clinique">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.clinique.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinique.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinique.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinique.fields.telephone') }}
                        </th>
                        <th>
                            {{ trans('cruds.clinique.fields.ville') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliniques as $key => $clinique)
                        <tr data-entry-id="{{ $clinique->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $clinique->id ?? '' }}
                            </td>
                            <td>
                                {{ $clinique->nom ?? '' }}
                            </td>
                            <td>
                                {{ $clinique->email ?? '' }}
                            </td>
                            <td>
                                {{ $clinique->telephone ?? '' }}
                            </td>
                            <td>
                                {{ $clinique->ville ?? '' }}
                            </td>
                            <td>
                                @can('clinique_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cliniques.show', $clinique->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('clinique_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cliniques.edit', $clinique->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('clinique_delete')
                                    <form action="{{ route('admin.cliniques.destroy', $clinique->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('clinique_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cliniques.massDestroy') }}",
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
        // if (confirm('{{ trans('global.areYouSure') }}')) {
        //     $.ajax({
        //     headers: {'x-csrf-token': _token},
        //     method: 'POST',
        //     url: config.url,
        //     data: { ids: ids, _method: 'DELETE' }})
        //     .done(function () { location.reload() })
        // }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Clinique:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection