function check(){
    var note = $('.note_name').val();
    var brand_name = $('.brand_name').val();

  if (note) {
    $('.note_name').removeClass("is-invalid");
    $('.submit').prop("disabled", false);
    $('.more').prop("disabled", false);

  }
  if (note == '') {
    $('.note_name').addClass("is-invalid");
    $('.submit').prop("disabled", true);
    $('.more').prop("disabled", true);
  }

  if (brand_name) {
    $('.submit').prop("disabled", false);
    $('.more').prop("disabled", false);
    $('.brand_name').removeClass("is-invalid");
  }
  if ($('.brand_name').val() == '') {
    $('.brand_name').addClass("is-invalid");
    $('.submit').prop("disabled", true);
    $('.more').prop("disabled", true);


  }
}


function showPreviewOne(event){
  if(event.target.files.length > 0){
    let src = URL.createObjectURL(event.target.files[0]);
    let preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
function myImgRemoveFunctionOne() {
  document.getElementById("file-ip-1-preview").src = "images/blank.png";
  $('#file').val('');
}
