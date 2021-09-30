@extends('layouts.admin')
@section('content')
@can('product_comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.product-comments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.productComment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productComment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProductComment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productComment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productComment.fields.user_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.productComment.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.productComment.fields.comment') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productComments as $key => $productComment)
                        <tr data-entry-id="{{ $productComment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productComment->id ?? '' }}
                            </td>
                            <td>
                                {{ $productComment->user_type ?? '' }}
                            </td>
                            <td>
                                {{ $productComment->user ?? '' }}
                            </td>
                            <td>
                                {{ $productComment->comment ?? '' }}
                            </td>
                            <td>
                                @can('product_comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-comments.show', $productComment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.product-comments.edit', $productComment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_comment_delete')
                                    <form action="{{ route('admin.product-comments.destroy', $productComment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_comment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.product-comments.massDestroy') }}",
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
  let table = $('.datatable-ProductComment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection