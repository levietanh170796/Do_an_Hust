@extends('adminlte::page')

@section('title', 'Khối lớp học')

@section('content_header')
    <h1>Khối lớp học</h1>
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
                        <th>Khối lớp học</th>
                        <td>{{ $level->title }}</td>
                      </tr>
                      <tr>
                        <th>Mô tả</th>
                        <td>{{ $level->description }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('levels.index') }}" class="btn btn-default">Danh sách khối lớp học</a>
      </div>
  </div>
@stop
