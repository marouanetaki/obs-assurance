@extends('layouts.admin')
@section('content')
@can('facture_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.factures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.facture.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.facture.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Facture">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.dossier') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.statut') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.frais_rembourse') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.created_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.mode_paiement') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factures as $key => $facture)
                        <tr data-entry-id="{{ $facture->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $facture->id ?? '' }}
                            </td>
                            <td>
                                {{ $facture->dossier->num_dossier ?? '' }}
                            </td>
                            <td>
                                @if($facture->dossier)
                                    <span class="text-success"><b>{{ $facture->dossier::STATUT_SELECT[$facture->dossier->statut] }}</b></span>
                                @endif
                            </td>
                            <td>
                                {{ $facture->frais_rembourse ?? '' }}
                            </td>
                            <td>
                                {{ $facture->created_by->name ?? '' }}
                            </td>
                            <td>
                                <span class="text-success"><b>{{ App\Models\Facture::MODE_PAIEMENT_SELECT[$facture->mode_paiement] ?? '' }}</b></span> 
                            </td>
                            <td>
                                @can('facture_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.factures.show', $facture->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('facture_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.factures.edit', $facture->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('facture_delete')
                                    <form action="{{ route('admin.factures.destroy', $facture->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('facture_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.factures.massDestroy') }}",
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
  let table = $('.datatable-Facture:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection