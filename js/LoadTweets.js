$(document).ready(function() {
  loadTweets("0");
  setInterval(function() {
    loadTweets("1");
  }, 30000);
  /* $("#submitTweet").click(loadTweets("1")); */
});

function loadTweets(mode) {
  $.ajax({
    type: "GET",
    url: "../php/GetTweets.php?mode=" + mode,
    async: false,
    cache: false,
    beforeSend: function() {
      $("#gif_updated")
        .show(0)
        .delay(1002)
        .hide(0);
    },
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
