<section class="details-card">
  <div class="container">
      <div class="row">
          <h2><b>CHỌN BỘ MÔN HỌC</b></h2>
          @foreach($subjects as $sb)
            <div class="col-md-4">
                <div class="card-content">
                    <div class="card-img">
                        <a href="/home?level={{$level}}&subject={{$sb->id}}">
                            <div class="home-box">
                                {{ $sb->title }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
          @endforeach
      </div>
  </div>
</section>
