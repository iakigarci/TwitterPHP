function sendTweet() {
  var form = $("#formTweetUser")[0];
  var data = new FormData(form);
  console.log(data);
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
      console.log("success");
      $("#tweetUsuario").val(data);
    },
    error: function() {
      console.log("fail");
    }
  });
}
