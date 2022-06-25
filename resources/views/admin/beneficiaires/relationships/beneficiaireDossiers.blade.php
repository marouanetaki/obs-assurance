@can('dossier_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.dossiers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.dossier.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.dossier.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaireDossiers">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.beneficiaire') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.date_soins') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.date_depot') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.statut') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dossiers as $key => $dossier)
                        <tr data-entry-id="{{ $dossier->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $dossier->id ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->beneficiaire->nom ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->date_soins ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->date_depot ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->total ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}
                            </td>
                            <td>
                                @can('dossier_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dossiers.show', $dossier->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('dossier_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dossiers.edit', $dossier->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('dossier_delete')
                                    <form action="{{ route('admin.dossiers.destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('dossier_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.dossiers.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-beneficiaireDossiers:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection