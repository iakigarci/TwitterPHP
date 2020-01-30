$(document).ready(function() {
  loadTrending();
  setInterval(loadTrending, 50000);
});

function loadTrending() {
  $.ajax({
    type: "GET",
    url: "../php/Trending.php",
    async: false,
    cache: false,
    success: function(data) {
      $("#trending-list").empty();
      /* $(
        '<ul class="list-group list-group-flush" id="trending-list"></ul>'
      ).insertAfter("#trending-header");
      console.log(data); */
      $("#trending-list").append(data);
    },
    error: function() {
      console.log("fail");
    }
  });
}
