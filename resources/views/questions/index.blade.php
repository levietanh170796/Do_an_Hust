@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('questions.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          {!! Form::open(['method' => 'GET', 'route' => ['questions.index']]) !!}
            <div class="col col-md-2">
                {!! Form::label('key', 'Từ khóa', ['class' => 'control-label']) !!}
                {!! Form::text('key', $key, ['class' => 'form-control', 'placeholder' => '']) !!}
            </div>
            <div class="col col-md-2">
                {!! Form::label('level', 'Khối lớp học', ['class' => 'control-label']) !!}
                {!!Form::select('level', $levels, $level, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-2">
                {!! Form::label('subject', 'Bộ môn học', ['class' => 'control-label']) !!}
                {!!Form::select('subject', $subjects, $subject, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-2">
                {!! Form::label('degree', 'Mức độ', ['class' => 'control-label']) !!}
                {!!Form::select('degree', $degrees, $degree, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-2">
                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                {!!Form::select('status', $statuses, $status, ['class' => 'form-control'])!!}
            </div>
            <div class="col col-md-2">
                {!! Form::submit('Lọc dữ liệu', ['class' => 'btn btn-success btn-search']) !!}
            </div>
          {!! Form::close() !!}
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th style="width: 500px">Câu hỏi</th>
              <th>Khối lớp học</th>
              <th>Bộ môn học</th>
              <th>Tỉ lệ trả lời đúng</th>
              <th>Mức độ</th>
              <th>Trạng thái</th>
              <th style="width: 150px"></th>
            </tr>
            @if (count($questions) > 0)
              @foreach ($questions as $question)
                <tr data-entry-id="{{ $question->id }}" class="{{ $question->status == 0 ? 'question-not-show' : '' }}">
                      <td>{{ $loop->index + 1 }}.</td>
                      <td>{{ $question->title }}</td>
                      <td>{{ $question->level->title }}</td>
                      <td>{{ $question->subject->title }}</td>
                      <td>
                        @if($question->percentCorrectAnswer() < 40) 
                          <span class = "label label-danger">{{ $question->percentCorrectAnswer() }} %</span>
                        @elseif($question->percentCorrectAnswer() > 40 && $question->percentCorrectAnswer() <= 70)
                          <span class = "label label-primary">{{ $question->percentCorrectAnswer() }} %</span>
                        @elseif($question->percentCorrectAnswer() >= 70)
                          <span class = "label label-success">{{ $question->percentCorrectAnswer() }} %</span>
                        @endif
                      </td>
                      <td>
                        @if($question->degree == 1) 
                          <span class = "label label-primary">Dễ</span>
                        @elseif($question->degree == 2)
                          <span class = "label label-warning">Trung bình</span>
                        @elseif($question->degree == 3)
                          <span class = "label label-danger">Khó</span>
                        @endif
                      </td>
                      <td>
                        @if($question->status == 1) 
                          <span class = "label label-primary">Hiển thị</span>
                        @elseif($question->status == 0)
                          <span class = "label label-danger">Không hiển thị</span>
                        @endif
                      </td>
                      <td>
                          <a href="{{ route('questions.show',[$question->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {{-- {!! Form::open(array(	
                              'style' => 'display: inline-block;',	
                              'method' => 'DELETE',	
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",	
                              'route' => ['questions.destroy', $question->id])) !!}	
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}	
                          {!! Form::close() !!} --}}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="5">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $questions->appends(request()->all())->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
