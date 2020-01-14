function addImage(img, id) {
  var tag = $("#" + id + "");
  tag.attr("src", "data:image/*;base64," + img + "");
}
