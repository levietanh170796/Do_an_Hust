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
      <div class="col col-md-4">
          <h3 class="color-content">Thông tin chi tiết</h3>
          <p>Email: <b>{{ auth()->user()->email }}</b></p>
          <p>Số điện thoại: <b>{{ auth()->user()->user_profile->phone_number }}</b></p>
          <p>Nghề nghiệp: <b>{{ auth()->user()->user_profile->job }}</b></p>
      </div>
      <div class="col col-md-4">
          <h3 class="color-content">Hỗ trợ</h3>
          <p>Gửi email về
            <b>
                    <a class="color-content" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=va.learning.59@gmail.com" target="_blank">va.learning.59@gmail.com</a>
            </b>
          </p>
          <p>Gọi điện về tổng đài <b><a  class="color-content" href="tel:0982624421">0982624421</a></b></p>
          {{-- <p>Chat với chúng tôi</p> --}}
      </div>
  </div>
  <div class="info">
      &nbsp;
  </div>

  <div class="info-contest-round">
      <div class="header-contest-round">
          <h3>VÒNG THI</h3>
      </div>
      <table class="table-contest-round">
          <tr style="background-color:#49920D;color:white;">
              <th class="th-table-user">Môn thi</th>
              <th class="th-table-user">Vòng thi</th>
              <th class="th-table-user">Số lần thi</th>
              <th class="th-table-user">Điểm số cao nhất</th>
              <th class="th-table-user">Thao tác</th>
          </tr>
          @foreach ($subjects as $subject)
            @if($subject->currentRound() != null) 
                <tr>
                    <td class="tr-table-user">{{ $subject->title }}</td>
                    <td class="tr-table-user">{{ $subject->currentRound()->title }}</td>
                    <td class="tr-table-user">{{ $subject->currentRound()->quantityTest($subject->id) }}</td>
                    <td class="tr-table-user">{{ $subject->maxScore($subject->currentRound()->id) }}</td>
                    <td class="tr-table-user">
                        @if($subject->checkPassRound($subject->currentRound()->id)) 
                            Chúc mừng! <br> Bạn đã vượt qua vòng thi
                        @else
                            <a href="{{ '/do_tests?level='.$subject->currentRound()->level->id.'&subject='.$subject->currentRound()->subject->id.'&contest_round='.$subject->currentRound()->id }}" 
                                class="btn btn-primary"> Vào thi</a>
                        @endif
                    </td>
                </tr>
            @endif
          @endforeach
      </table>
  </div>
  
@stop
