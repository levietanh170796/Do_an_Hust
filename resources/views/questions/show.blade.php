@extends('adminlte::page')

@section('title', 'Câu hỏi')

@section('content_header')
    <h1>Câu hỏi</h1>
@stop

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
          Thông tin
      </div>
      
      <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                  <table class="table table-bordered table-striped">
                      <tr>
                        <th>Câu hỏi</th>
                        <td>{{ $question->title }}</td>
                      </tr>
                      <tr>
                        <th>Khối lớp học</th>
                        <td>{{ $question->level->title }}</td>
                      </tr>
                      <tr>
                        <th>Bộ môn học</th>
                        <td>{{ $question->subject->title }}</td>
                      </tr>
                      <tr>
                        <th>Trạng thái</th>
                        <td>{{ $question->status == 1 ? 'Hiển thị' : 'Không hiển thị' }}</td>
                      </tr>
                  </table>
              </div>
          </div>

          <p>&nbsp;</p>
					<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<th>Đáp án</th>
								<th>Đáp án đúng</th>
								<th style="width: 100px"></th>
							</tr>
							@foreach ($question->question_options as $answer)
								<tr data-entry-id="{{ $answer->id }}">
									<td>{{ $answer->option }}</td>
									<td>
                    @if($answer->correct === 1)
                      <i class="fa  fa-check text-success"></i>
                    @else
                      <i class="fa  fa-times text-danger"></i>
                    @endif
                  </td>
									<td>
										<a href="{{ route('questions.edit',[$question->id]) }}" class="btn btn-xs btn-info">
                      <i class="fa  fa-edit "></i>
                    </a>
									</td>
								</tr>
							@endforeach
						</table>
					</div>
          <p>&nbsp;</p>

          <a href="{{ route('questions.index') }}" class="btn btn-default">Danh sách câu hỏi</a>

      </div>
  </div>
@stop
