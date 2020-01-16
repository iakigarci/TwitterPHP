$(document).ready(function() {
  loadTweets();
  setInterval(loadTweets, 15000);
  $("#submitTweet").click(loadTweets);
});

function loadTweets() {
  $.ajax({
    type: "GET",
    url: "../php/GetTweets.php",
    async: false,
    cache: false,
    success: function(data) {
      console.log("success");
      $(data).insertAfter("#lista-tweet");
      $("p").html(function(_, html) {
        return html.replace(/(\#\w+)/g, '<span class="blue">$1</span>');
      });
    },
    error: function() {
      console.log("fail");
    }
  });
}
