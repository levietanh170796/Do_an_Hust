@extends('adminlte::page')

@section('title', 'Bộ môn học')

@section('content_header')
    <h1>Bộ môn học</h1>
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
                        <th>Bộ môn học</th>
                        <td>{{ $subject->title }}</td>
                      </tr>
                      <tr>
                        <th>Mô tả</th>
                        <td>{{ $subject->description }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('subjects.index') }}" class="btn btn-default">Danh sách bộ môn học</a>
      </div>
  </div>
@stop
