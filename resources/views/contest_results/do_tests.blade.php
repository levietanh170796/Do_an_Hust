@extends('layouts.user') 

@section('content')
  @if(!empty($failMsg))
    <div class="text-danger">
      <h3><b>Chú ý!</b> {{ $failMsg }}</h3>
      </div>
  @else
    <div class="info-contest_round">
      <div class="col col-md-4">
        <p>Thí sinh: <b class="color-content">{{ auth()->user()->name }}</b></p>
        <p><b class="color-content">{{ App\Level::find($level)->title }}</b></p>
      </div>
      <div class="col col-md-4">
          <p>Môn thi: <b class="color-content">{{ App\Subject::find($subject)->title }}</b></p>
          <p>Vòng thi hiện tại: <b class="color-content">{{ App\ContestRound::find($contest_round)->title }}</b></p>
      </div>
      <div class="col col-md-4">
          <p>Lần thi: <b class="color-content">{{ App\Subject::find($subject)->currentRound()->quantityTest($subject) }}</b></p>
          <p>Điểm cao nhất: <b class="color-content">{{ App\Subject::find($subject)->maxScore($contest_round) }}</b></p>
      </div>
    </div>  

    <div class="info">
        &nbsp;
    </div>
    <div class="text-danger">
      <h3><b>Chú ý!</b> Khi bạn thoát hoặc reload lại trang thì kết quả sẽ được tính.</h3>
    </div>
    <div class="question-contest-round">
      <div class="timer">
          {{-- <div class="title-timer"><h4>Thời gian:</h4></div>   --}}
          <div class="timer-quiz" data-countdown="{{
            Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(App\ContestRound::find($contest_round)->timer)
            }}"></div>
      </div>
      {!! Form::open(['method' => 'POST', 'route' => ['submit'], "id" => "form-Quiz"]) !!}
        @foreach($questions as $question)
          <input type="hidden" name="questions[]" value="{{ $question->id }}">
          <div class="panel panel-info">
            <div class="panel-heading title_question">
                <span class="title-question"><b>Câu hỏi {{ $loop->index + 1 }}: </b></span>
                {{ $question->title }}
            </div>
            <div class="panel-body title_question_option">
              @foreach($question->question_options as $qt)
                <div class="col col-md-6">
                    <div class="radio">
                      <label>
                        <input type="radio" name="{{ $question->id }}" value={{ $qt->id }}>
                        <b>{{ $option_names[$loop->index]  }}</b>{{ $qt->option }}
                      </label>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
        <input type="hidden" name="contest_round_id" value="{{ $contest_round }}">
        <input type="hidden" class="timer-quiz" name="timer" value="">
        <input type="hidden" id="refresh" value="no">
      <div class="btn-submit-contest">
        {!! Form::submit('Nộp bài', ['class' => 'btn btn-primary btn-lg btn-submit-quiz']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  @endif
@stop

<script type="text/javascript">
  window.onbeforeunload = function(event) {
    $("#form-Quiz").submit();
  };
</script>
