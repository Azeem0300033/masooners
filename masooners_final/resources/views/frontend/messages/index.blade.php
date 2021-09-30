@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('message_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.messages.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.message.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.message.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Message">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.message.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.message.fields.message') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.message.fields.userid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.message.fields.customerid') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.message.fields.flow') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $key => $message)
                                    <tr data-entry-id="{{ $message->id }}">
                                        <td>
                                            {{ $message->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $message->message ?? '' }}
                                        </td>
                                        <td>
                                            {{ $message->userid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $message->customerid ?? '' }}
                                        </td>
                                        <td>
                                            {{ $message->flow ?? '' }}
                                        </td>
                                        <td>
                                            @can('message_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.messages.show', $message->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('message_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.messages.edit', $message->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('message_delete')
                                                <form action="{{ route('frontend.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('message_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.messages.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Message:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection