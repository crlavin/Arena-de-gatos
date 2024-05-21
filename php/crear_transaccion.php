<?php

use Transbank\Webpay\WebpayPlus\Transaction;

$transaction = new Transaction();

$amount = $_POST['monto']; // Monto de la transacción
$sessionId = session_id(); // ID de la sesión actual
$buyOrder = uniqid(); // Generar un identificador único para la orden
$returnUrl = 'http://localhost/arena-de-gatos/php/crear_transaccion.php'; // URL de retorno después del pago

$response = $transaction->create($buyOrder, $sessionId, $amount, $returnUrl);

echo json_encode(['url' => $response->getUrl().'?token_ws='.$response->getToken()]);
?>
