<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir archivos de PHPMailer
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'phpmailer/src/Exception.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Outlook
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'arenaparagatos2@outlook.com'; // Tu dirección de correo de Outlook
    $mail->Password = 'arenaparagatos.02'; // Tu contraseña de correo de Outlook
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinatarios
    $mail->setFrom('arenaparagatos2@outlook.com', 'ARENA PARA GATOS');
    $mail->addAddress('arenaparagatos2@outlook.com', 'Jonh Doe');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Detalle de compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>EL ID de su compra es <b>' . $id_transaccion . '</b></p>';

    $mail->Body = $cuerpo;
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', 'phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo "El correo ha sido enviado con éxito.";
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico de la compra: {$mail->ErrorInfo}";
}
