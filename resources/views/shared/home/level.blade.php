<section class="details-card">
  <div class="container">
      <div class="row">
          <h2><b>CHỌN KHỐI LỚP HỌC</b></h2>
          @foreach($levels as $lv)
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <a href="/home?level={{$lv->id}}">
                            <div class="home-box">
                              {{ $lv->title }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
          @endforeach
      </div>
  </div>
</section>
