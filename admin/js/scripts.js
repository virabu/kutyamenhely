$(document).ready(function() {
  $('#summernote').summernote({
    height: 140
  });

  $('#selectAllBoxes').click(function(event){
    if(this.checked) {
      $('.checkBoxes').each(function(){
        this.checked = true;
      });
    } else {
      $('.checkBoxes').each(function(){
        this.checked = false;
      });
    }
  })


  /*animation during loading: */

  // const div_box = "<div id='load-screen'><div id='loading'></div></div>";

  // $("body").prepend(div_box);

  // $('#load-screen').delay(200).fadeOut(200, function() {
  //   $(this).remove();
  // })


});


function loadUsersOnline() {
  $.get("../admin/functions.php?onlineusers=result", function(data) {
    $(".usersonline").text(data);
  });
}

setInterval(function() {
  loadUsersOnline();
}, 500);
