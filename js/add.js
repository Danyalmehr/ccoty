
///////////////////////////////////////////ADD NOTE//////////////////////////////
  $(document).ready(function(){
    var i = 1;
    $('#add_note').click(function(){
      i++;
      $('#note_table').append('<tr id="row'+i+'" class="newRow"><td><input onkeyup="check()" name="note[]" id="note" type="text" class="note_name is-invalid note form-control name_list" placeholder="Note" required></td><td> <select onchange="check()" name="note_category[]" id="note_category" type="text" class="note_category form-control name_list" required><option value="" selected hidden>Fragrance Category...</option><option value="Fruit">Fruit</option><option value="Flower">Flower</option><option value="Wood">Wood</option><option value="Plant">Plant</option><option value="Other">Other</option></select></td><td><button class="btn btn-danger btn_remove mb-2" type="button" name="remove" id="'+i+'">Remove</button></td></tr>');
    });
  });

  $(document).ready(function(){
    var i = 1;
    $('#add').click(function(){
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'" class="newRow"><td><input onkeyup="check()" name="brand_name[]" id="sd'+i+'" type="text" class="brand_name is-invalid form-control name_list" placeholder="Brand Name"></td><td><input name="brand_desc[]" id="brand_desc" type="text" class="form-control name_list" placeholder="About Brand"></td><td><button class="btn btn-danger btn_remove mb-2" type="button" name="remove" id="'+i+'">Remove</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function(){

      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });
  });


//////////////////////////////////////////INSERT Notes and Brand//////////////////
  $(document).ready(function(){

      $(".submit").click(function(event){
        $('.submit').prop("hidden", true);

        let first_input = $('.inp').val();

        if (first_input == '') {
          alert('first input must be filled');
        }

          else if (first_input != '') {
          event.preventDefault();

          var form = $('.add_data')[0];
          var data = new FormData(form);

          $.ajax({
              url: 'insert.php',
              enctype: 'multipart/form-data',
              type: 'post',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              beforeSend:function(){
                $('#loader').prop("hidden", false);
              },
              success: function(response){
                  if(response != false){
                    $('#loader').prop("hidden", true);

                    $('#result').html(response);
                    $('.add_data')[0].reset();
                    $('.result').removeClass("hidden");
                    $('.add_data').prop("hidden", true);


                    $('.newRow').remove();

                  }
                  else{
                      alert('Somthing went wrong!');
                  }
              },
          });
        }
        else {
          alert('First row must be filled!')
        }

      });
  });



////////////////////////////////////////////CHOOSING NOTE pLACEMENT//////////////
  $(document).ready(function(){

    $(document).on('click','#button', function(){
      $('#note_name').val($(this).text());
      $('#result').html('');
    });

    $("#add_top_note").click(function(){
      var note = $('#note_name').val();
      if (note != '') {
      $('#note_name').val('');
      $('#top_note').append('<tr class="input"><td><input style="background-color:#5BC0DE" class="note text-white" type="text" name="top_note[]" value="'+ note +'" readonly></input></td>');
    }
    });

    $("#add_heart_note").click(function(){
      var note = $('#note_name').val();
      if (note != '') {
      $('#note_name').val('');
      $('#heart_note').append('<tr class="input"><td><input class="note bg-danger text-white" type="text" name="heart_note[]" value="'+ note +'" readonly></input></td>');
    }
    });

    $("#add_base_note").click(function(){
      var note = $('#note_name').val();
      if (note != '') {
      $('#note_name').val('');
      $('#base_note').append('<tr class="input"><td><input class="note bg-primary" type="text" name="base_note[]" value="'+ note +'" readonly></input></td>');
    }
    });
  });


////////////////////////////////////////////iNSERTING FRAGRANCE//////////////////////////
  $(document).ready(function(){

      $("#insert").click(function(event){

          if ($('.input').length) {
          event.preventDefault();


          var form = $('#add_fragrance')[0];
          var data = new FormData(form);

          $.ajax({
              url: 'insert.php',
              enctype: 'multipart/form-data',
              type: 'post',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 600000,
              beforeSend:function(){
                $('#insert').prop("hidden", true);
                $('#insertloader').prop("hidden", false);

              },
              success: function(response){
                  if(response != false){
                    $('#insertloader').prop("hidden", true);
                    $('#file-ip-1-preview').attr('src','images/blank.png');
                    alert(response);
                    $('#add_fragrance')[0].reset();
                    $('.input').remove();
                    $('#insert').prop("hidden", false);



                  }
                  else{
                      alert('file not uploaded');
                  }
              },
          });
        }
        else {
          alert('Required inputs have not been filled')
        }

      });
  });
