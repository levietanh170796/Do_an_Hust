@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
@stop

@section('content')
  <div class="col col-md-12">
      {!! Form::open(['method' => 'POST', 'route' => ['questions.store']]) !!}
        <div class="panel panel-default">
          <div class="panel-heading">
              Thêm mới
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
                {!! Form::label('option1', 'Đáp án 1*', ['class' => 'control-label']) !!}
                {!! Form::text('option1', old('option1'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('option2', 'Đáp án 2*', ['class' => 'control-label']) !!}
                {!! Form::text('option2', old('option2'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('option3', 'Đáp án 3*', ['class' => 'control-label']) !!}
                {!! Form::text('option3', old('option3'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('option4', 'Đáp án 4*', ['class' => 'control-label']) !!}
                {!! Form::text('option4', old('option4'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('correct_id', 'Đáp án chính xác*', ['class' => 'control-label']) !!}
                {!!Form::select('correct_id', $corrects, old('correct_id'), ['class' => 'form-control'])!!}
                {!! Form::label('status', 'Trạng thái*', ['class' => 'control-label']) !!}
                {!!Form::select('status', $statuses, old('status'), ['class' => 'form-control'])!!}
              </div>
            </div>
          </div>
        </div>
      <a href="{{ route('questions.index') }}" class="btn btn-default">{{ __('Kết thúc') }}</a>
      {!! Form::submit('Lưu và Thêm câu hỏi', ['class' => 'btn btn-success ']) !!}
      {!! Form::close() !!}
  </div>
@stop
