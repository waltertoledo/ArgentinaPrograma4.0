<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$remitente = $_REQUEST['name'];
$asunto = $_REQUEST['subject'];
$email = $_REQUEST['email'];
$mensaje = $_REQUEST['message'];

$mail = new PHPMailer();
$mail->CharSet = 'utf-8';
$mail->Host = "smtp.gmail.com";
$mail->From = "walter.toledo2012@gmail.com";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Username = "walter.toledo2012@gmail.com";
$mail->Password = 'AQUI CLAVE DE ACCESO';
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->AddAddress($email);
$mail->SMTPDebug  = 0;
$mail->isHTML(true);
$mail->Subject = $asunto;
$mail->Body    = $mensaje;

if(!$mail->send()) {
    echo 'El mensaje no ha podido ser enviado';
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado exitosamente';
}
?>