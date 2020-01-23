$(document).ready(function () {
    $('#formcat').on('submit', function (e) {
        var formData = {
            'name': $('#newscat').val()
        };
        alert(formData);
        e.preventDefault();
    })

})

alert('coucou')