$(document).ready(function() {
  loadTweets();
});

function loadTweets() {
  $.ajax({
    type: "GET",
    url: "../php/GetTweets.php",
    async: false,
    cache: false,
    success: function(data) {
      console.log("success");
      console.log(data);
      $(data).insertAfter("#lista-tweet");
    },
    error: function() {
      console.log("fail");
    }
  });
}
