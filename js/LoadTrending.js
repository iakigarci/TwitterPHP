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
      console.log("success");
      console.log(data);
      $(data).insertAfter("#trending");
    },
    error: function() {
      console.log("fail");
    }
  });
}
