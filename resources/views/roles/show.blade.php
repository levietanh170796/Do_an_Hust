@extends('adminlte::page')

@section('title', 'Vai trò')

@section('content_header')
    <h1>Vai trò</h1>
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
                        <th>Vai trò</th>
                        <td>{{ $role->title }}</td>
                      </tr>
                      <tr>
                        <th>Mô tả</th>
                        <td>{{ $role->description }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('roles.index') }}" class="btn btn-default">Danh sách vai trò</a>
      </div>
  </div>
@stop
