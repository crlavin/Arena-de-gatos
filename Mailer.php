<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{

    function enviarEmail($email, $asunto, $cuerpo)
    {
        require_once './config/config.php';
        require './phpmailer/src/PHPMailer.php';
        require './phpmailer/src/SMTP.php';
        require './phpmailer/src/Exception.php';

        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Outlook
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = MAIL_USER; // Tu dirección de correo de Outlook
            $mail->Password = MAIL_PASS; // Tu contraseña de correo de Outlook
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = MAIL_PORT;

            // Destinatarios
            $mail->setFrom(MAIL_USER, 'ARENA PARA GATOS');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;

            $mail->Body = $cuerpo;
            $mail->setLanguage('es', 'phpmailer/language/phpmailer.lang-es.php');

            if($mail->send()){
                return true;
            } else {
                return false;
            }
            echo "El correo ha sido enviado con éxito.";
        } catch (Exception $e) {
            echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
        }
    }
}
