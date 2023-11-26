$(document).ready(function() {
    // Activa el acordeón
    $('.collapse').on('show.bs.collapse', function() {
        // Cierra otros acordeones abiertos
        $('.collapse.show').not(this).collapse('hide');
    });
});