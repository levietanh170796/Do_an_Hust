<div class="container">


  
  <h1>{{ App\ContestRound::find($contest_round)->title }}</h1>
  <div class="timer-quiz">
      <div data-countdown="{{
        Carbon\Carbon::now('Asia/Ho_Chi_Minh')->addMinutes(App\ContestRound::find($contest_round)->timer)
        }}"></div>
  </div>
  {!! Form::open(['method' => 'POST', 'route' => ['submit'], "id" => "form-Quiz"]) !!}
    @foreach($questions as $question)
      <input type="hidden" name="questions[]" value="{{ $question->id }}">
      <div class="panel panel-info">
        <div class="panel-heading title_question">
            <b>Câu hỏi {{ $loop->index + 1 }}: </b>
            {{ $question->title }}
        </div>
        <div class="panel-body title_question_option">
          @foreach($question->question_options as $qt)
            <div class="radio">
              <label>
                <input type="radio" name="{{ $question->id }}" value={{ $qt->id }}> {{ $qt->option }}
              </label>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
    <input type="hidden" name="contest_round_id" value="{{ $contest_round }}">
  <div class="btn-submit-contest">
    {!! Form::submit('Nộp bài', ['class' => 'btn btn-primary btn-lg btn-submit-quiz']) !!}
    {!! Form::close() !!}
  </div>
</div>
