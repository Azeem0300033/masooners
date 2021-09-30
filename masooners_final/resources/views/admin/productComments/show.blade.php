@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productComment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productComment.fields.id') }}
                        </th>
                        <td>
                            {{ $productComment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productComment.fields.user_type') }}
                        </th>
                        <td>
                            {{ $productComment->user_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productComment.fields.user') }}
                        </th>
                        <td>
                            {{ $productComment->user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productComment.fields.comment') }}
                        </th>
                        <td>
                            {{ $productComment->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection