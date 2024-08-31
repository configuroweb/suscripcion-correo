<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// archivos requeridos
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["email"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];

    try {

        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host       = 'tu host de correo';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tu correo';
        $mail->Password   = 'tu contraseña';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->CharSet = 'UTF-8';

        // Destinatarios
        $mail->setFrom('localhost@demoscweb.com', 'ConfiguroWeb');
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo('localhost@demoscweb.com', 'ConfiguroWeb');

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = '¡Bienvenido a ConfiguroWeb!';

        // Cuerpo del correo en HTML enriquecido
        $mail->Body = "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Bienvenido a ConfiguroWeb</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #f9f9f9;
                }
                .header {
                    background-color: #4CAF50;
                    color: white;
                    text-align: center;
                    padding: 20px;
                }
                .content {
                    background-color: white;
                    padding: 20px;
                    border-radius: 5px;
                }
                .button {
                    display: inline-block;
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                }
                .footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 0.8em;
                    color: #666;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>¡Bienvenido a ConfiguroWeb!</h1>
                </div>
                <div class='content'>
                    <p>Estimado Suscriptor,</p>
                    <p>¡Estamos encantados de darte la bienvenida a nuestro boletín! Tu decisión de unirte a nuestra comunidad nos llena de alegría.</p>
                    <p>Con ConfiguroWeb, te esperan:</p>
                    <ul>
                        <li>Actualizaciones emocionantes sobre tecnología web</li>
                        <li>Ofertas exclusivas en nuestros cursos y servicios</li>
                        <li>Contenido valioso para impulsar tu carrera en desarrollo web</li>
                    </ul>
                    <p>No dudes en contactarnos si tienes alguna pregunta o sugerencia. Estamos aquí para ayudarte en tu viaje de aprendizaje.</p>
                    <p>
                        <a href='https://www.configuroweb.com/' class='button'>Visita Nuestro Sitio</a>
                    </p>
                    <p>¡Gracias por unirte a nosotros!</p>
                    <p>Saludos cordiales,<br>Mauricio Sevilla<br>Fundador de ConfiguroWeb</p>
                </div>
                <div class='footer'>
                    © 2023 ConfiguroWeb. Todos los derechos reservados.
                </div>
            </div>
        </body>
        </html>
        ";

        $mail->send();
        echo "
            <script>
            alert('El mensaje se envió con éxito. ¡Gracias por contactarnos!');
            document.location.href = 'index.php';
            </script>
        ";
    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Error del mailer: {$mail->ErrorInfo}";
    }
}
