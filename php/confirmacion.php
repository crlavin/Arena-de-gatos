<?php

use Transbank\Webpay\WebpayPlus\Transaction;

$token = $_POST['token_ws']; // Token recibido de Transbank

$transaction = new Transaction();
$response = $transaction->commit($token);

if ($response->isApproved()) {
  // La transacción fue aprobada
  echo 'Pago realizado con éxito. Orden de compra: ' . $response->getBuyOrder();
} else {
  // La transacción fue rechazada
  echo 'El pago fue rechazado. Motivo: ' . $response->getStatus();
}
?>
