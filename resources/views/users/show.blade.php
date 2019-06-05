@extends('adminlte::page')

@section('title', 'Người dùng')

@section('content_header')
    <h1>Người dùng</h1>
@stop

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
          Thông tin
      </div>
      
      <div class="panel-body">
          <div class="row">
              <div class="col-md-6">
                  <table class="table table-bordered table-striped">
                      <tr>
                        <th>Tên</th>
                        <td>{{ $user->name }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                      </tr>
                      <tr>
                        <th>Vai trò</th>
                        <td>{{ $user->role->title }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('users.index') }}" class="btn btn-default">Danh sách người dùng</a>
      </div>
  </div>
@stop
