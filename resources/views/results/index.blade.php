@extends('layouts.user') 

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Kết quả</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col col-md-6">
                <table class="table table-bordered table-striped">
                    <tr>
                      <th>Tên thí sinh</th>
                      <td>{{ auth()->user()->name }}</td>
                    </tr>
                    <tr>
                      <th>Bộ môn học</th>
                      <td>{{ $contest_round->subject->title }}</td>
                    </tr>
                    <tr>
                      <th>Khối lớp học</th>
                      <td>{{ $contest_round->level->title }}</td>
                    </tr>
                    <tr>
                      <th>Vòng thi</th>
                      <td>{{ $contest_round->title }}</td>
                    </tr>
                    <tr>
                      <th>Lần thi</th>
                      <td>{{ $contest_round->subject->currentRound()->quantityTest($contest_round->subject->id) }}</td>
                    </tr>
                    <tr>
                      <th>Kết quả</th>
                      <td><b>{{ $contest_result->number_question_correct.' / '.$contest_result->number_question }}</b></td>
                    </tr>
                    <tr>
                      <th>Thời gian</th>
                      <td>{{ $contest_result->timer }} giây</td>
                    </tr>
                </table>
            </div>
            @if($contest_result->status == 1)
              <div class="col col-md-6">
                <div class="show-result">
                  <img src="/images/commons/pass.png" alt="">
                </div>
                <div class="text-result text-success">
                  <p>Chúc mừng bạn đã vượt qua vòng thi!</p>
                </div>
              </div>
            @else
              <div class="col col-md-6">
                <div class="show-result">
                  <img src="/images/commons/fail.png" alt="">
                </div>
                <div class="text-result text-danger">
                  <p>Rất tiếc! Bạn chưa vượt qua vòng thi!</p>
                </div>
              </div>
            @endif
        </div>

        <p>&nbsp;</p>
        <a href="{{ route('home') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Về trang chủ</a>
        @if($contest_result->status == 1)
          @if($contest_round->nextRound() !== null)
            <a href="{{ '/do_tests?level='.$contest_round->level->id.'&subject='.$contest_round->subject->id.'&contest_round='.$contest_round->nextRound()->id }}"
              class="btn btn-success">Bài thi tiếp theo   <i class="fa fa-arrow-right"></i></a>
          @endif
        @else
          <a href="{{ '/do_tests?level='.$contest_round->level->id.'&subject='.$contest_round->subject->id.'&contest_round='.$contest_round->id }}"
            class="btn btn-primary"><i class="fa fa-refresh"></i>  Làm lại bài thi</a>
          
        @endif
    </div>
  </div>
@stop
