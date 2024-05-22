<?php
// Datos de la pasarela de pago (en un escenario real, estos serían proporcionados por la pasarela de pago)
$fakepay_api_key = 'your_fakepay_api_key';
$fakepay_amount = 100; // Monto a cobrar en centavos ($1.00)

// Función para procesar el pago utilizando la pasarela de pago FakePay (ejemplo)
function fakepay_process_payment($api_key, $amount, $card_number, $expiry_date, $cvv) {
    // Aquí iría la lógica de conexión y envío de datos a la pasarela de pago real
    // En este ejemplo, simplemente simularemos un pago exitoso
    return array(
        'success' => true,
        'error' => ''
    );
}

// Procesamiento del pago
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Validación de datos (puedes añadir más validaciones según tus necesidades)
    $card_number = $_POST['card_number'] ?? '';
    $expiry_date = $_POST['expiry_date'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    // Validaciones básicas
    if (empty($card_number) || empty($expiry_date) || empty($cvv)) {
        echo "Todos los campos son obligatorios.";
    } elseif (!preg_match('/^\d{16}$/', $card_number)) {
        echo "Número de tarjeta inválido. Debe contener 16 dígitos.";
    } elseif (!preg_match('/^\d{2}\/\d{2}$/', $expiry_date)) {
        echo "Fecha de expiración inválida. Formato correcto: MM/YY.";
    } elseif (!preg_match('/^\d{3,4}$/', $cvv)) {
        echo "CVV inválido. Debe contener 3 o 4 dígitos.";
    } else {
        // Envío de los datos a la pasarela de pago
        $response = fakepay_process_payment($fakepay_api_key, $fakepay_amount, $card_number, $expiry_date, $cvv);

        // Verificación de la respuesta de la pasarela de pago
        if ($response['success']) {
            // El pago fue exitoso
            echo "¡El pago se ha realizado correctamente!";
        } else {
            // El pago falló
            echo "Lo siento, ha ocurrido un error durante el procesamiento del pago: " . $response['error'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento de Pago</title>
</head>
<body>
    <h1>Procesamiento de Pago</h1>
    <form method="POST" action="">
        <label for="card_number">Número de Tarjeta:</label><br>
        <input type="text" id="card_number" name="card_number" required><br>
        <label for="expiry_date">Fecha de Expiración (MM/YY):</label><br>
        <input type="text" id="expiry_date" name="expiry_date" required><br>
        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" required><br>
        <input type="submit" name="submit" value="Pagar">
    </form>
</body>
</html>
