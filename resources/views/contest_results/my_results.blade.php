@extends('layouts.user') 

@section('content')
  <div class="info-user">
      <div class="col col-md-4">
          <div class="col col-md-3">
              <img src="{{ asset('/images/commons/image-student.png')}}" class="img-responsive" alt="Cinque Terre">
          </div>
          <div class="col col-md-9">
              <h3 class="color-content">{{ auth()->user()->name }}</h3>
              <p><b>{{ auth()->user()->level->title }}</b></p>
              <p><b>{{ auth()->user()->user_profile->address }}</b></p>
              <p><b>ID: {{ auth()->user()->id }}</b></p>
          </div>
      </div>
      <div class="col col-md-8">
          <h3 class="color-content">Thông tin chi tiết</h3>
          <p>Email: <b>{{ auth()->user()->email }}</b></p>
          <p>Số điện thoại: <b>{{ auth()->user()->user_profile->phone_number }}</b></p>
          <p>Nghề nghiệp: <b>{{ auth()->user()->user_profile->job }}</b></p>
      </div>
  </div>
  <div class="info">
      &nbsp;
  </div>

  <div class="box">
    <div class="box-header with-border">
      {!! Form::open(['method' => 'GET', 'route' => ['my_results']]) !!}
      <div class="col col-md-4">
          {!! Form::label('subject', 'Bộ môn học', ['class' => 'control-label']) !!}
          {!!Form::select('subject', $subjects, $subject, ['class' => 'form-control'])!!}
      </div>
      <div class="col col-md-8">
          {!! Form::submit('Xem', ['class' => 'btn btn-custom btn-search']) !!}
      </div>
      {!! Form::close() !!}
    </div>
    <div class="box-body">
      <table class="table table-bordered table-striped">
        <tr>
          <th class="th-table-result">Môn thi</th>
          <th class="th-table-result">Vòng thi</th>
          <th class="th-table-result">Lần thi</th>
          <th class="th-table-result">Số câu trả lời đúng</th>
          <th class="th-table-result">Trạng thái</th>
          <th class="th-table-result">Thời gian hoàn thành</th>
          <th class="th-table-result">Ngày hoàn thành</th>
          <th class="th-table-result"></th>
        </tr>
        @if (count($contest_results) > 0)
          @foreach ($contest_results as $contest_result)
              <tr data-entry-id="{{ $contest_result->id }}">
                  <td>{{ $contest_result->subject->title }}</td>
                  <td>{{ $contest_result->contest_round->title }}</td>
                  <td>{{ $contest_result->number_current_contest_round($contest_result->subject->id, auth()->user()) }}</td>
                  <td><b>{{ $contest_result->number_question_correct.'/'.$contest_result->contest_round->quantity_questions }}</b></td>
                  <td>
                    @if($contest_result->status == 1)
                      <span class = "label label-success">Đã vượt qua</span>
                    @else
                      <span class = "label label-danger">Chưa vượt qua</span>
                    @endif
                  </td>
                  <td>
                    <i class="fa fa-clock-o text-success"></i>  {{ $contest_result->timer }} giây
                  </td>
                  <td>
                      <i class="fa fa-calendar text-success"></i>   {{ date('H:i - d-m-Y', strtotime($contest_result->created_at) + 3600 * 7) }}
                  </td>
                  <td>
                    <a href="{{ route('contest_results.show',[$contest_result->id]) }}" class="btn btn-xs btn-primary">
                      <i class="fa fa-eye"></i>  Xem
                    </a>
                  </td>
              </tr>
          @endforeach
        @else
            <tr>
                <td colspan="7"><b>Không có bài thi nào</b></td>
            </tr>
        @endif
      </table>
      {{ $contest_results->appends(request()->all())->links() }}
    </div>
  </div>
@stop
