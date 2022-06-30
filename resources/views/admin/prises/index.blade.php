@extends('layouts.admin')
@section('content')
<p>
    Avant d'ajouter une prise en charge, vous devez telecharger et remplir le documents suivant auprés 
    de votre clinique <a href="http://obs-assurance.test/prise_en_charge.pdf"><b>Dossier PC</b></a>
</p>
@can('prise_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.prises.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.prise.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.prise.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Prise">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.beneficiaire') }}
                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.clinique') }}
                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.statut') }}
                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.type_operation') }}
                        </th>
                        <th>
                            {{ trans('cruds.prise.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prises as $key => $prise)
                        <tr data-entry-id="{{ $prise->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $prise->id ?? '' }}
                            </td>
                            <td>
                                {{ $prise->beneficiaire->nom ?? '' }}
                            </td>
                            <td>
                                {{ $prise->clinique->nom ?? '' }}
                            </td>
                            <td>
                                @if ( App\Models\Prise::STATUT_RADIO[$prise->statut] == 'Réglé' )
                                    <span class="text-success"><b>{{ App\Models\Prise::STATUT_RADIO[$prise->statut] ?? '' }}</b></span>
                                @elseif ( App\Models\Prise::STATUT_RADIO[$prise->statut] == 'Rejeté' )
                                    <span class="text-danger"><b>{{ App\Models\Prise::STATUT_RADIO[$prise->statut] ?? '' }}</b></span>
                                @else
                                    <span class="text-warning"><b>{{ App\Models\Prise::STATUT_RADIO[$prise->statut] ?? '' }}</b></span>
                                @endif
                            </td>
                            <td>
                                {{ $prise->type_operation ?? '' }}
                            </td>
                            <td>
                                {{ $prise->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('prise_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.prises.show', $prise->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endcan

                                @can('prise_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.prises.edit', $prise->id) }}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                @endcan

                                {{-- @can('prise_delete')
                                    <form action="{{ route('admin.prises.destroy', $prise->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('prise_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.prises.massDestroy') }}",
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
  let table = $('.datatable-Prise:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection