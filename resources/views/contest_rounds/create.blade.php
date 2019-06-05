@extends('adminlte::page')

@section('title', 'Vòng kiểm tra')

@section('content_header')
    <h1>Vòng kiểm tra</h1>
@stop

@section('content')
  <div class="col col-md-8">
      {!! Form::open(['method' => 'POST', 'route' => ['contest_rounds.store']]) !!}
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
                {!! Form::label('title', 'Tên vòng kiểm tra*', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('level_id', 'Khối lớp học*', ['class' => 'control-label']) !!}
                {!!Form::select('level_id', $levels, old('level_id'), ['class' => 'form-control'])!!}
                {!! Form::label('subject_id', 'Bộ môn học*', ['class' => 'control-label']) !!}
                {!!Form::select('subject_id', $subjects, old('subject_id'), ['class' => 'form-control'])!!}
                {!! Form::label('quantity_questions', 'Tổng số câu hỏi*', ['class' => 'control-label']) !!}
                {!! Form::number('quantity_questions', 0, ['class' => 'form-control quantity_questions', 'placeholder' => '']) !!}
                {!! Form::label('quantity_easys', 'Số lượng câu hỏi dễ*', ['class' => 'control-label']) !!}
                {!! Form::number('quantity_easys', 0, ['class' => 'form-control quantity_easys', 'placeholder' => '']) !!}
                {!! Form::label('quantity_normals', 'Số lượng câu hỏi trung bình*', ['class' => 'control-label']) !!}
                {!! Form::number('quantity_normals', 0, ['class' => 'form-control quantity_normals', 'placeholder' => '']) !!}
                {!! Form::label('quantity_hards', 'Số lượng câu hỏi khó*', ['class' => 'control-label']) !!}
                {!! Form::number('quantity_hards', 0, ['class' => 'form-control quantity_hards', 'placeholder' => '']) !!}
                {!! Form::label('quantity_correct', 'Số lượng câu đúng*', ['class' => 'control-label']) !!}
                {!! Form::number('quantity_correct', 0, ['class' => 'form-control quantity_correct', 'placeholder' => '']) !!}
                {!! Form::label('sequence', 'Số thứ tự*', ['class' => 'control-label']) !!}
                {!! Form::number('sequence', 0, ['class' => 'form-control', 'placeholder' => '']) !!}
                {!! Form::label('timer', 'Thời gian*', ['class' => 'control-label']) !!}
                {!! Form::number('timer', old('timer'), ['class' => 'form-control', 'placeholder' => 'Phút']) !!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success btn-submit-contest-round']) !!}
      {!! Form::close() !!}
  </div>
@stop
