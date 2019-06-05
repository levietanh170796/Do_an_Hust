$('[data-countdown]').each(function() {
  var $this = $(this);
  var finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
     $this.html(event.strftime('<i class="fa fa-clock-o"></i> %M:%S'));
     $(".timer-quiz").val(event.offset.minutes * 60 + event.offset.seconds);
     if(event.offset.minutes === 0 && event.offset.seconds === 0) {
       $("#form-Quiz").submit();
     }
  });
});

$('.quantity_questions').on('change', function(){
  checkQuantityQuestion();
  checkQuantityCorrect();
})

$('.quantity_easys').on('change', function(){
  checkQuantityQuestion();
})

$('.quantity_normals').on('change', function(){
  checkQuantityQuestion();
})

$('.quantity_hards').on('change', function(){
  checkQuantityQuestion();
})

$('.quantity_correct').on('change', function(){
  checkQuantityCorrect();
})

function checkQuantityQuestion() {
  var quantity_questions =  parseInt($('.quantity_questions').val());
  var quantity_easys =  parseInt($('.quantity_easys').val());
  var quantity_normals =  parseInt($('.quantity_normals').val());
  var quantity_hards =  parseInt($('.quantity_hards').val());

  if((quantity_easys + quantity_normals + quantity_hards) > quantity_questions) {
    alert('Tổng các loại câu hỏi không được lớn tổng số câu hỏi');
    $('.btn-submit-contest-round').attr('disabled','disabled');
  } else {
    $('.btn-submit-contest-round').removeAttr('disabled');;
  }
}

function checkQuantityCorrect() {
  var quantity_questions =  parseInt($('.quantity_questions').val());
  var quantity_correct =  parseInt($('.quantity_correct').val());

  if(quantity_correct > quantity_questions) {
    alert('Số lượng câu đúng không được lớn tổng số câu hỏi');
      $('.btn-submit-contest-round').attr('disabled','disabled');
    } else {
      $('.btn-submit-contest-round').removeAttr('disabled');;
    }
}

$(".subject-leader-boards").change(function() {
  $.ajax({
    type: 'GET',
    url: '/rounds-by-subject',
    data: { 'subject_id': this.value },
    success:function(data) {
      var text = "";
      $.each(data, function( key, value ) {
        text += '<option value="' + key + '">' + value + '</option>';
      });

      $(".round-leader-boards").empty().append(text);
    }
  });
});
