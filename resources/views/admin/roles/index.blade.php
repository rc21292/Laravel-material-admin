@extends('layouts.master')
@section('title','Role List')
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <a class="btn btn-success float-right" href="{{ route('admin.roles.create') }}">
              {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
            </a>
            <h4 class="card-title">{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</h4>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="10">

                    </th>
                    <th>
                      {{ trans('cruds.role.fields.id') }}
                    </th>
                    <th>
                      {{ trans('cruds.role.fields.title') }}
                    </th>
                    <th>
                      {{ trans('cruds.role.fields.permissions') }}
                    </th>
                    <th>
                      &nbsp;
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $key => $role)
                  <tr data-entry-id="{{ $role->id }}">
                    <td>

                    </td>
                    <td>
                      {{ $role->id ?? '' }}
                    </td>
                    <td>
                      {{ $role->name ?? '' }}
                    </td>
                    <td>
                      @foreach($role->permissions()->pluck('name') as $permission)
                      <span class="badge badge-info">{{ $permission }}</span>
                      @endforeach
                    </td>
                    <td>
                      <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">
                        {{ trans('global.view') }}
                      </a>

                      <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                        {{ trans('global.edit') }}
                      </a>

                      <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                      </form>
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
</div>
@endsection
@section('scripts')

@endsection