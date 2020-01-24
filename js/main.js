$(document).ready(function () {
  $(".createform").submit(function (e) {
    $('.message').empty();
    let mydata = $(this).serialize();
    $.post("/tmpboot2/admin/create_article.php", mydata).done(function( data ) {
      $( ".message" ).append("Donnée Envoyé avec succés");
      $('.createform').trigger("reset");
    });
    e.preventDefault();
  });
});
