@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
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
                        <th>Tên vòng kiểm tra</th>
                        <td>{{ $contest_round->title }}</td>
                      </tr>
                      <tr>
                        <th>Khối lớp học</th>
                        <td>{{ $contest_round->level->title }}</td>
                      </tr>
                      <tr>
                        <th>Bộ môn học</th>
                        <td>{{ $contest_round->subject->title }}</td>
                      </tr>
                      <tr>
                        <th>Tổng số câu hỏi</th>
                        <td>{{ $contest_round->quantity_questions }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi dễ</th>
                        <td>{{ $contest_round->quantity_easys }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi trung bình</th>
                        <td>{{ $contest_round->quantity_normals }}</td>
                      </tr>
                      <tr>
                        <th>Số câu hỏi khó</th>
                        <td>{{ $contest_round->quantity_hards }}</td>
                      </tr>
                      <tr>
                        <th>Số lượng câu đúng</th>
                        <td>{{ $contest_round->quantity_correct }}</td>
                      </tr>
                      <tr>
                        <th>Số thứ tự</th>
                        <td>{{ $contest_round->sequence }}</td>
                      </tr>
                      <tr>
                        <th>Thời gian</th>
                        <td>{{ $contest_round->timer }} phút</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>

          <a href="{{ route('contest_rounds.index') }}" class="btn btn-default">Danh sách vòng kiểm tra</a>
      </div>
  </div>
@stop
