@extends('layouts.admin')
@section('content')
@can('beneficiaire_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.beneficiaires.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.beneficiaire.title_singular') }}
            </a>
            @can('can_import')
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Beneficiaire', 'route' => 'admin.beneficiaires.parseCsvImport'])
            @endcan
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaire.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Beneficiaire">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.date_naissance') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.lien_parente') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.statut') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaire.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneficiaires as $key => $beneficiaire)
                        <tr data-entry-id="{{ $beneficiaire->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiaire->id ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaire->nom ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaire->date_naissance ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiaire::LIEN_PARENTE_SELECT[$beneficiaire->lien_parente] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Beneficiaire::STATUT_SELECT[$beneficiaire->statut] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaire->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('beneficiaire_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiaires.show', $beneficiaire->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('beneficiaire_edit')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.beneficiaires.edit', $beneficiaire->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                @can('beneficiaire_delete')
                                    <form action="{{ route('admin.beneficiaires.destroy', $beneficiaire->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('beneficiaire_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.beneficiaires.massDestroy') }}",
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
  let table = $('.datatable-Beneficiaire:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection