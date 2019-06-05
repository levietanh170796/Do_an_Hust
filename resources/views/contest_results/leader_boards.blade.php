@extends('layouts.user') 

@section('content')
<h3 class="color-content">Xếp hạng </h3>
<section class="content">
    <div class="row">
      <div class="box">
        <div class="box-header with-border">
          {!! Form::open(['method' => 'GET', 'route' => ['leader_boards']]) !!}
          <div class="col col-md-3">
              {!! Form::label('subject', 'Bộ môn học', ['class' => 'control-label']) !!}
              {!!Form::select('subject', $subjects, $subject, ['class' => 'form-control subject-leader-boards'])!!}
          </div>
          <div class="col col-md-3">
              {!! Form::label('contest_round', 'Vòng thi', ['class' => 'control-label']) !!}
              {!!Form::select('contest_round', $contest_rounds, $contest_round, ['class' => 'form-control round-leader-boards'])!!}
          </div>
          <div class="col col-md-3">
              {!! Form::submit('Xem', ['class' => 'btn btn-custom btn-search']) !!}
          </div>
          {!! Form::close() !!}
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th class="th-table-result" style="width: 300px">Tên người dùng</th>
              <th class="th-table-result">Khối lớp học</th>
              <th class="th-table-result">Vòng thi</th>
              <th class="th-table-result">Số câu trả lời đúng</th>
              <th class="th-table-result">Thời gian</th>
            </tr>
            @foreach($total_subjects as $sb)
              @foreach($total_contest_rounds as $cr)
                @if(count($sb->leader_boards($cr->id)) > 0)
                  @foreach($sb->leader_boards($cr->id) as $r)
                    <tr data-entry-id="{{ $r->id }}" class="{{ $r->user->id == auth()->user()->id ? 'active-user' : '' }}">
                        <td><b>{{ $r->user->name }}</b></td>
                        <td>{{ $r->level->title }}</td>
                        <td>{{ $r->contest_round->title }}</td>
                        <td><b>{{ $r->number_question_correct."/".$r->number_question }}</b></td>
                        <td>
                            <i class="fa fa-clock-o text-success"></i>   {{ $r->timer }}  giây
                        </td>
                    </tr>
                  @endforeach
                @endif
              @endforeach
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </section>
@stop
