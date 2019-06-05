@extends('adminlte::page')

@section('title', 'Vai trò')

@section('content_header')
    <h1>Vai trò</h1>
@stop

@section('content')
  <div class="col col-md-6">
      {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}
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
                  {!! Form::label('title', 'Vai trò*', ['class' => 'control-label']) !!}
                  {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  {!! Form::label('description', 'Mô tả', ['class' => 'control-label']) !!}
                  {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
  </div>
@stop
