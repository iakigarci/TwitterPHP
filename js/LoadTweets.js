$(document).ready(function() {
  loadTweets();
});

function loadTweets() {
  $.ajax({
    type: "GET",
    url: "../php/GetTweets.php",
    async: false,
    cache: false,
    success: function(data) {}
  });
}
