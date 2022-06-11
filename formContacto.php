<!-- Validación de campos -->
<?php
	if (
        empty($_POST['name']) || 
	    empty($_POST['phone']) ||
        empty($_POST['message']) ||
        !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ){
	    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
	            echo "El correo que usted ingresó tiene un ";
	        }
	        if (empty($_POST['name'])){
	            echo "El nombre que usted ingresó tiene un ";
	        }
	        if (empty($_POST['phone'])){
	            echo "El telefono que usted ingresó tiene un ";
	        }
	        if (empty($_POST['myVal'])){
	            echo "La opción de servicio que usted eligió tiene un  ";
	        }
            if (empty($_POST['message'])){
	            echo "El mensaje que usted ingresó tiene un ";
	        }
	        echo "error";
	    }
	    else {
	        $destino= "info@funerariaibanez.cl";
	        $nombre = $_POST["name"];
	        $correo = $_POST["email"];
	        $telefono = $_POST["phone"];
	        $mensaje = $_POST["message"];
	        $contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nTelefono: " . $telefono ."\nMensaje: " . $mensaje;
            mail($destino, "Contacto", $contenido);
	        echo "Mensaje Enviado";
	    }

    function validarNombre() {
        if (document.getElementById("nombre").value.indexOf(" ") !== -1) {
            alert("La contraseña no puede contener espacios en blanco");
            return false;
        }
        echo "El mensaje ha sido enviado correctamente";
        header ("Location:index.html");
    }
?>
<!-- Fin Validación de campos -->

<!-- Mensaje de error -->
<!DOCTYPE html>
<html>
    <head>
        <title>Funeraria Iba&ntilde;ez</title>
        <link rel="stylesheet" type="text/css" href="./CSS/notificacionMensaje.css">
        <link rel="icon" type="image/x-icon" href="./IMG/LogoOriginal.png">
    </head>
    <body>
        <div class="container-fluid" style ="text-align: center">
            <form action="contacto.html" method="post">
                <div><br>
                    <button type="button" class="bt" onclick="location.href='contacto.html'">Volver</button>
                </div>
                <br>
            </form>
        </div>
    </body>
</html>
<!-- Fin Mensaje de error -->

<!-- Envío de solicitud -->
<?php

    $nombre = $_POST["name"];
	$correo = $_POST["email"];
	$telefono = $_POST["phone"];
	$mensaje = $_POST["message"];

    $body = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'sadnibbawitdreams@gmail.com';                     // SMTP username
        $mail->Password   = '13042020';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('sadnibbawitdreams@gmail.com', $nombre);
        $mail->addAddress('info@funerariaibanez.cl', 'Funeraria');     // Add a recipient
    
        // Attachments
    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Mensaje de Contacto';
        $mail->Body    = $body;
    

        $mail->send();
        echo '<script>
            alert("El mensaje se envió correctamente");
            window.history.go(-1);
            <\script>';

    } catch (Exception $e) {
            echo 'No se pudo enviar el mensaje: ' , $mail->ErrorInfo;
    }

    header('Location: index.html');
?>
<!-- Fin Envío de solicitud -->