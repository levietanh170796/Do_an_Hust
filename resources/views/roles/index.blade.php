@extends('adminlte::page')

@section('title', 'Vai trò')

@section('content_header')
    <h1>Vai trò</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('roles.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  @if (session('error_delete'))
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Bạn không thể xoá vai trò " {{ session('error_delete') }} "
    </div>
  @endif
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách vai trò</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th>Vai trò</th>
              <th>Mô tả</th>
              <th style="width: 200px"></th>
            </tr>
            @if (count($roles) > 0)
              @foreach ($roles as $role)
                  <tr data-entry-id="{{ $role->id }}">
                      <td>{{ $loop->index + 1 }}.</td>
                      <td>{{ $role->title }}</td>
                      <td>{{ $role->description }}</td>
                      <td>
                          <a href="{{ route('roles.show',[$role->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['roles.destroy', $role->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="3">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $roles->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
