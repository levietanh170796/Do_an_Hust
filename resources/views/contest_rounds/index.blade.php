@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('contest_rounds.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  @if (session('error_delete'))
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Bạn không thể xoá vòng thi " {{ session('error_delete') }} "
    </div>
  @endif
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          {!! Form::open(['method' => 'GET', 'route' => ['contest_rounds.index']]) !!}
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
              <th style="width: 200px">Tên vòng kiểm tra</th>
              <th>Khối lớp học</th>
              <th>Bộ môn học</th>
              <th>Tổng số câu hỏi</th>
              <th>Số câu hỏi dễ</th>
              <th>Số câu hỏi trung bình</th>
              <th>Số câu khó</th>
              <th>Số lượng câu đúng</th>
              <th>Số thứ tự</th>
              <th>Thời gian</th>
              <th style="width: 100px"></th>
            </tr>
            @if (count($contest_rounds) > 0)
              @foreach ($contest_rounds as $contest_round)
                  <tr data-entry-id="{{ $contest_round->id }}">
                      <td>{{ $loop->index + 1 }}.</td>
                      <td>{{ $contest_round->title }}</td>
                      <td>{{ $contest_round->level->title }}</td>
                      <td>{{ $contest_round->subject->title }}</td>
                      <td>{{ $contest_round->quantity_questions }}</td>
                      <td>{{ $contest_round->quantity_easys }}</td>
                      <td>{{ $contest_round->quantity_normals }}</td>
                      <td>{{ $contest_round->quantity_hards }}</td>
                      <td>{{ $contest_round->quantity_correct }}</td>
                      <td>{{ $contest_round->sequence }}</td>
                      <td>{{ $contest_round->timer }} phút</td>
                      <td>
                          <a href="{{ route('contest_rounds.show',[$contest_round->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('contest_rounds.edit',[$contest_round->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['contest_rounds.destroy', $contest_round->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="7"><b>Không có bản ghi nào</b></td>
                </tr>
            @endif
          </table>
          {{ $contest_rounds->appends(request()->all())->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
