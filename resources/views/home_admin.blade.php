@extends('adminlte::page')

@section('title', 'V-learning')

@section('content_header')
@stop

@section('content')
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $total_users }}</h3>
        <p>Người dùng</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-plus"></i>
      </div>
      <a href="/users" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ $total_questions }}</h3>
        <p>Câu hỏi</p>
      </div>
      <div class="icon">
        <i class="fa fa-question-circle"></i>
      </div>
      <a href="questions" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $total_contest_results }}</h3>
        <p>Bài người dùng đã làm</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar-check-o"></i>
      </div>
      <a href="/contest_results" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-blue">
      <div class="inner">
        <h3>{{ $total_levels }}</h3>
        <p>Khối lớp học</p>
      </div>
      <div class="icon">
        <i class="fa  fa-bookmark"></i>
      </div>
      <a href="/levels" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $total_subjects }}</h3>
        <p>Bộ môn học</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i>
      </div>
      <a href="/subjects" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{ count(App\Role::all()) }}</h3>
        <p>Vai trò</p>
      </div>
      <div class="icon">
        <i class="fa fa-key"></i>
      </div>
      <a href="/roles" class="small-box-footer">
        Chi tiết <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  
  
@stop
