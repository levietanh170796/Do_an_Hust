@extends('layouts.user') 

@section('content')
  <div class="col col-md-6 form-edit-profile">
    <h4 class="color-content">
      THAY ĐỔI THÔNG TIN CÁ NHÂN
    </h4>
    @if (session('status'))
    <h5  class="color-content">
      Bạn vui lòng cập nhật thông tin trước khi sử dụng hệ thống. Xin cảm ơn!
    </h5>
    @endif
    {!! Form::model($userProfile, ['method' => 'PUT', 'route' => ['user_profiles.update', $userProfile->id]]) !!}
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
    {!! Form::label('name', 'Họ và tên', ['class' => 'control-label']) !!}
    {!! Form::text('name', $userProfile->user->name, ['class' => 'form-control input-edit-user', 'placeholder' => '']) !!}
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::text('email', $userProfile->user->email, ['class' => 'form-control input-edit-user', 'placeholder' => '']) !!}
    {!! Form::label('level_id', 'Khối lớp học*', ['class' => 'control-label']) !!}
    {!! Form::select('level_id', $levels,  $userProfile->user->level_id, ['class' => 'form-control input-edit-user'])!!}
    {!! Form::label('address', 'Địa chỉ', ['class' => 'control-label']) !!}
    {!! Form::text('address', old('address'), ['class' => 'form-control input-edit-user', 'placeholder' => '']) !!}
    {!! Form::label('phone_number', 'Số điện thoại', ['class' => 'control-label']) !!}
    {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control input-edit-user', 'placeholder' => '']) !!}
    {!! Form::label('job', 'Nghề nghiệp', ['class' => 'control-label']) !!}
    {!! Form::text('job', old('job'), ['class' => 'form-control input-edit-user', 'placeholder' => '']) !!}
    {!! Form::submit('Cập nhật thông tin', ['class' => 'btn btn-custom input-edit-user']) !!}
    {!! Form::close() !!}
  </div>
@stop
