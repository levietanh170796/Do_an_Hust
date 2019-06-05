@extends('layouts.user') 

@section('content')
  <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="color-content">Đáp án</h3>
      </div>
      
      <div class="panel-body">
          <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Vòng thi</th>
                        <td><b>{{ $contest_result->contest_round->title }}</b></td>
                    </tr>
                    <tr>
                        <th>Môn thi</th>
                        <td>{{ $contest_result->contest_round->subject->title }}</td>
                    </tr>
                    <tr>
                        <th>Lần thi</th>
                        <td>Lần {{ $contest_result->number_current_contest_round($contest_result->subject->id, auth()->user()) }}</td>
                    </tr>
                    <tr>
                        <th>Kết quả</th>
                        <td><b>{{ $contest_result->number_question_correct.' / '.$contest_result->number_question }}</b></td>
                    </tr>
                    <tr>
                        <th>Trạng thái</th>
                        <td>
                        @if($contest_result->status == 1)
                            <span class = "label label-success">Đã vượt qua</span>
                        @else
                            <span class = "label label-danger">Chưa vượt qua</span>
                        @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Thời gian hoàn thành</th>
                        <td> <i class="fa fa-clock-o text-success"></i>  {{ $contest_result->timer }} giây</td>
                    </tr>
                    <tr>
                        <th>Ngày hoàn thành</th>
                        <td><i class="fa fa-calendar text-success"></i>   {{ date('H:i - d-m-Y', strtotime($contest_result->created_at) + 3600 * 7) }}</td>
                    </tr>
                </table>
              </div>
              <div class="col-md-12">
                @if(count($contest_result->results) > 0)
                    @foreach($contest_result->results as $result)
                        @php
                            $question = $result->question;
                        @endphp
                        <input type="hidden" name="questions[]" value="{{ $question->id }}">
                        <div class="panel panel-info">
                            <div class="panel-heading title_question">
                                <b>Câu hỏi {{ $loop->index + 1 }}: </b>
                                {{ $question->title }}
                            </div>
                            <div class="panel-body title_question_option">
                                @foreach($question->question_options as $qt)
                                    {{-- <div class="col col-md-6"> --}}
                                        <div class="radio radio-result {{ $qt->correct == 1 ? 'radio-true' : '' }} ">
                                            @if($result->questions_option_id ==  $qt->id && $result->correct == 1)
                                                <span class="answer-true">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                            @elseif($result->questions_option_id ==  $qt->id && $result->correct == 0)
                                                <span class="answer-false">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            @else
                                                <span class="space-option">
                                                </span>
                                            @endif
                                            
                                            <label>
                                                <input disabled {{ $result->questions_option_id ==  $qt->id ? "checked" : ""}}
                                                        type="radio" name="{{ $question->id }}"
                                                        value={{ $qt->id }}> <b>{{ $option_names[$loop->index]  }}</b> {{ $qt->option }} 
                                            </label>
                                        </div>
                                    {{-- </div> --}}
                                @endforeach
                            </div>
                        </div>
                    @endforeach 
                @endif
              </div>
          </div>

          <p>&nbsp;</p>

           <!-- <a href="{{ route('my_results') }}" class="btn btn-default">Bài kiểm tra của tôi</a>  -->
      </div>
  </div>
@stop
