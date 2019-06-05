@extends('adminlte::page')

@section('title', 'Người dùng')

@section('content_header')
    <h1>Người dùng</h1>
@stop

@section('content')
  {{-- <p>
    <a href="{{ route('users.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p> --}}
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách người dùng</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th>Tên người dùng</th>
              <th>Email</th>
              <th>Vai trò</th>
              <th style="width: 200px"></th>
            </tr>
            @if (count($users) > 0)
              @foreach ($users as $user)
                  <tr data-entry-id="{{ $user->id }}">
                      <td>{{ $loop->index + 1 }}.</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role->title }}</td>
                      <td>
                          <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {{-- {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['users.destroy', $user->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!} --}}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="3">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
