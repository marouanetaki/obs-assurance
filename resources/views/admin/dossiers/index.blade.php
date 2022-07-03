@extends('layouts.admin')
@section('content')
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
            <table class=" table table-bordered table-striped table-hover datatable datatable-Dossier">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.num_dossier') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.beneficiaire') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.date_soins') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.statut') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.created_by') }}
                        </th>
                        <th>
                            {{ trans('cruds.dossier.fields.created_at') }}
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
                                {{ $dossier->num_dossier ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->beneficiaire->nom ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->date_soins ?? '' }}
                            </td>
                            <td>
                                @if ( App\Models\Dossier::STATUT_SELECT[$dossier->statut] == 'Remboursé' )
                                    <span class="text-success"><b>{{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}</b></span>
                                @elseif ( App\Models\Dossier::STATUT_SELECT[$dossier->statut] == 'Enregistré' )
                                    <span class="text-warning"><b>{{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}</b></span>
                                @elseif ( App\Models\Dossier::STATUT_SELECT[$dossier->statut] == 'En cours de traitement' )
                                    <span class="text-info"><b>{{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}</b></span>
                                @else
                                    <span class="text-danger"><b>{{ App\Models\Dossier::STATUT_SELECT[$dossier->statut] ?? '' }}</b></span>
                                @endif
                            </td>
                            <td>
                                {{ $dossier->created_by->name ?? '' }}
                            </td>
                            <td>
                                {{ $dossier->created_at ?? '' }}
                            </td>
                            <td>
                                @can('dossier_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.dossiers.show', $dossier->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('dossier_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.dossiers.edit', $dossier->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('dossier_delete')
                                    <form action="{{ route('admin.dossiers.destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let table = $('.datatable-Dossier:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection