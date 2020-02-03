$(document).ready(function() {
  howManyConnected();
  setInterval(howManyConnected(), 30000);
});

function howManyConnected() {
  $.ajax({
    type: "GET",
    url: "../xml/Counter.xml",
    dataType: "xml",
    async: false,
    cache: false,
    beforeSend: function() {
      $("#user_updated")
        .show(0)
        .delay(500)
        .hide(0);
    },
    success: function(xml) {
      var numUsus = 0;
      numUsus = $(xml)
        .find("user")
        .text();
      $("#userCounter").text(numUsus);
    }
  });
}
