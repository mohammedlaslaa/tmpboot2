$(document).ready(function() {
  $(".createform").submit(function(e) {
    let mydata = $(this).serialize();
    $.post("/tmpboot2/admin/traitement.php", mydata);

    e.preventDefault();
  });
});
