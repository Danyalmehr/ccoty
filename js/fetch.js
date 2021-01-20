

$(document).ready(function(){
  $("#search").keyup(function(){
    if(this.value.length > 2 ){
    var searchtext = $(this).val();
    if (searchtext != '') {
      $('.initial').prop("hidden", true);
      $.ajax({
        url:"fetch.php",
        method:"post",
        data:{search:searchtext},
        dataType:"text",
        beforeSend:function(){
          $('#loader').prop("hidden", false);
        },
        success:function(response){
          $('#loader').prop("hidden", true);
          $('#result').html(response);
        }
      });
    }
    else {
      $('.info').prop("hidden", false);
    }
  }
  else if(this.value.length < 2 ) {
    $('.initial').html('You have to enter at least 3 characters');
  }
  });
});

$(document).ready(function(){

  $("#note_name").keyup(function(){
    if(this.value.length > 2 ){
    var searchtext = $(this).val();
    if (searchtext != '') {
      $.ajax({
        url:"fetch.php",
        method:"post",
        data:{note:searchtext},
        dataType:"text",
        beforeSend:function(){
          $('#loader').removeClass('hidden');
        },
        success:function(response){
          $('#loader').addClass('hidden');
          $('#result').html(response);
        }
      });
    }
    else {
      $('#result').html('Nothing was found');
    }
    }
    else if(this.value.length < 3 & this.value.length >= 0 ) {
      $('#result').html('You have to enter at least 3 characters');
    }
  });
});
