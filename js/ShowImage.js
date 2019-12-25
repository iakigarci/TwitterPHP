$(document).on("click", ".browse", function() {
  var f = $("#fileHidden");

  f.trigger("click");
  verImagen(f);
});

function verImagen(input) {
  $("#file").val(input.val());

  var reader = new FileReader();
  reader.onload = function(e) {
    // get loaded data and render thumbnail.
    $("#preview").src = e.target.result;
  };
  // read the image file as a data URL.
  reader.readAsDataURL($("#fileHidden")[0].files[0]);
}
