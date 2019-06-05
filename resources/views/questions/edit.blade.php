@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
@stop

@section('content')
  <div class="col col-md-12">
      {!! Form::model($question, ['method' => 'PUT', 'route' => ['questions.update', $question->id]]) !!}
        <div class="panel panel-default">
          <div class="panel-heading">
              Sửa thông tin
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12 form-group">
                @if(count($errors))
                  <div class="alert alert-danger">
                    <strong>Lỗi!</strong>
                    <br/>
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                {!! Form::label('title', 'Câu hỏi*', ['class' => 'control-label']) !!}
                {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'rows' => 3]) !!}
                {!! Form::label('level_id', 'Khối lớp học*', ['class' => 'control-label']) !!}
                {!!Form::select('level_id', $levels, old('level_id'), ['class' => 'form-control'])!!}
                {!! Form::label('subject_id', 'Bộ môn học*', ['class' => 'control-label']) !!}
                {!!Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control'])!!}
                {!! Form::label('degree', 'Mức độc*', ['class' => 'control-label']) !!}
                {!!Form::select('degree', $degrees, old('degree'), ['class' => 'form-control'])!!}
                @foreach ($question_options as $answer)
                  {!! Form::label('option'.($loop->index + 1), 'Đáp án '.($loop->index + 1).'*', ['class' => 'control-label']) !!}
                  {!! Form::text('option'.($loop->index + 1), $answer->option, ['class' => 'form-control', 'placeholder' => '']) !!}
                  @php
                    if($answer->correct == 1) {
                      $correct_id = $answer->id;
                    } 
                  @endphp
                @endforeach
                {!! Form::label('correct_id', 'Đáp án chính xác*', ['class' => 'control-label']) !!}
                {!!Form::select('correct_id', $corrects, $correct_id, ['class' => 'form-control'])!!}
                {!! Form::label('status', 'Trạng thái*', ['class' => 'control-label']) !!}
                {!!Form::select('status', $statuses, old('status'), ['class' => 'form-control'])!!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
  </div>
@stop
