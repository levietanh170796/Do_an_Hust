@extends('adminlte::page')

@section('title', 'Bộ môn học')

@section('content_header')
    <h1>Bộ môn học</h1>
@stop

@section('content')
  <p>
    <a href="{{ route('subjects.create') }}" class="btn btn-success">
      <i class="fa fa-plus-circle"></i> Thêm mới
    </a>
  </p>
  @if (session('error_delete'))
    <div class="alert alert-danger alert-dismissible fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      Bạn không thể xoá môn học " {{ session('error_delete') }} "
    </div>
  @endif
  <section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Danh sách bộ môn học</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 50px">#</th>
              <th>Bộ môn học</th>
              <th>Mô tả</th>
              <th style="width: 200px"></th>
            </tr>
            @if (count($subjects) > 0)
              @foreach ($subjects as $subject)
                  <tr data-entry-id="{{ $subject->id }}">
                      <td>{{ $loop->index + 1 }}.</td>
                      <td>{{ $subject->title }}</td>
                      <td>{{ $subject->description }}</td>
                      <td>
                          <a href="{{ route('subjects.show',[$subject->id]) }}" class="btn btn-xs btn-primary">
                            <i class="fa fa-eye"></i>
                          </a>
                          <a href="{{ route('subjects.edit',[$subject->id]) }}" class="btn btn-xs btn-info">
                            <i class="fa  fa-edit "></i>
                          </a>
                          {!! Form::open(array(
                              'style' => 'display: inline-block;',
                              'method' => 'DELETE',
                              'onsubmit' => "return confirm('Bạn có muốn xoá không?');",
                              'route' => ['subjects.destroy', $subject->id])) !!}
                          {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger'] )  }}
                          {!! Form::close() !!}
                      </td>
                  </tr>
              @endforeach
            @else
                <tr>
                    <td colspan="3">Không có bản ghi nào</td>
                </tr>
            @endif
          </table>
          {{ $subjects->links() }}
        </div>
      </div>
    </div>
  </section>
@stop
