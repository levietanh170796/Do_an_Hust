@extends('adminlte::page')

@section('title', 'Người dùng')

@section('content_header')
    <h1>Người dùng</h1>
@stop

@section('content')
  <div class="col col-md-6">
      {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
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
                  {!! Form::label('name', 'Tên', ['class' => 'control-label']) !!}
                  {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                  {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                  {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'readonly']) !!}
                  {!! Form::label('role_id', 'Vai trò*', ['class' => 'control-label']) !!}
                  {!!Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control'])!!}
              </div>
            </div>
          </div>
        </div>
      {!! Form::submit('Lưu thông tin', ['class' => 'btn btn-success']) !!}
      {!! Form::close() !!}
  </div>
@stop
