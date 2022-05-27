$(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
            $(this).find("a").html("<i class='fas fa-bars'></i>");
        } else {
            $(".item").addClass("active");
            $(this).find("a").html("<i class='fas fa-times'></i>");
        }
    });
});

/* Capturando valor de select */
$('#contacto').on('submit', function () {
    var valueToSend = $('#tipoServicio').val();
    $.ajax({
      method: 'POST',
      url: 'formSolicitudServicio.php',
      data: {
         myVal: valueToSend
      },
      success: function (data) {
         console.log('Success: ' + data); // Este callback se lanza cuando la url 'myPage' responde con status 200.
      },
      error: function (data) {
         console.log('Error: ' + data); // Este callback que se lanzara si la url 'myPage.php' responde con status de error, e.g. 400, 404, 500, etc...
      }
    });
  });