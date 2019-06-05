@extends('adminlte::page')

@section('title', 'Bài đã làm')

@section('content_header')
    <h1>Bài đã làm</h1>
@stop

@section('content')
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          {!! Form::open(['method' => 'GET', 'route' => ['contest_results.index']]) !!}
            <div class="col col-md-3">
              {!! Form::label('user_name', 'Tên người dùng', ['class' => 'control-label']) !!}
              {!! Form::text('user_name', $user_name, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>
            <div class="col col-md-3">
                {!! Form::label('level', 'Khối lớp học', ['class' => 'control-label']) !!}
                {!!Form::select('level', $levels, $level, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-3">
                {!! Form::label('subject', 'Bộ môn học', ['class' => 'control-label']) !!}
                {!!Form::select('subject', $subjects, $subject, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-3">
                {!! Form::submit('Lọc dữ liệu', ['class' => 'btn btn-success btn-search']) !!}
            </div>
          {!! Form::close() !!}
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th style="width: 300px">Tên người dùng</th>
              <th>Tên vòng thi</th>
              <th>Số câu hỏi</th>
              <th>Số câu trả lời đúng</th>
              <th>Khối lớp học</th>
              <th>Bộ môn học</th>
              <th>Trạng thái</th>
              <th></th>
            </tr>
            @if (count($contest_results) > 0)
              @foreach ($contest_results as $contest_result)
                  <tr data-entry-id="{{ $contest_result->id }}">
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $contest_result->user->name }}</td>
                      <td>{{ $contest_result->contest_round->title }}</td>
                      <td>{{ $contest_result->number_question }}</td>
                      <td>{{ $contest_result->number_question_correct }}</td>
                      <td>{{ $contest_result->level->title }}</td>
                      <td>{{ $contest_result->subject->title }}</td>
                      <td>
                        @if($contest_result->status == 1)
                          <span class = "label label-primary">Đã vượt qua</span>
                        @else
                          <span class = "label label-danger">Chưa vượt qua</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('contest_results.show',[$contest_result->id]) }}" class="btn btn-xs btn-primary">
                          <i class="fa fa-eye"></i>  Xem
                        </a>
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="7"><b>Không có bản ghi nào</b></td>
                </tr>
            @endif
          </table>
          {{ $contest_results->appends(request()->all())->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
