$(document).ready(function() {
  $("#gif_upload").hide();
});
function sendTweet() {
  if ($("#tweetUsuario").val() == "") {
    alert("No puede ser vacio");
  } else {
    var form = $("#formTweetUser")[0];
    var data = new FormData(form);
    $.ajax({
      type: "POST",
      enctype: "multipart/form-data",
      url: "../php/UploadTweet.php",
      data: data,
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        //limpiar
        $("#tweetUsuario").val(data);
        console.log("success");
        $("#gif_upload")
          .show(0)
          .delay(1002)
          .hide(0);
      },
      error: function() {
        console.log("fail");
      }
    });
  }
}
