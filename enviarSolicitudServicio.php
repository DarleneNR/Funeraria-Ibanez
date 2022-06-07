<?php 

header('Content-Type: text/html; charset=UTF-8');

/* Campos llenados por el usuario */
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Telefono:"
 . $telefono . "<br>Mensaje: " . $mensaje;

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
    $mail->Subject = 'Solicitud de Servicio';
    $mail->Body    = $body;
   

    $mail->send();
    echo '<script>
           alert("El mensaje se envio correctamente");
           window.history.go(-1);
           <\script>';

} catch (Exception $e) {
        echo 'No se pudo enviar el mensaje: ' , $mail->ErrorInfo;
}

header('Location: index.html');

?>