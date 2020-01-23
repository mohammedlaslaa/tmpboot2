$(document).ready(function () {
    $('.createform').submit( function (e) {
        
        console.log($(this).serializeArray());
        let mydata = $(this).serialize();
        $.post('/tmpboot2/admin/traitement.php', mydata);
        
        e.preventDefault();
    })

})
