<?php
require 'config/database.php';
require 'config/config.php';
$db = new Database();
$con = $db->conectar();

if ($con) {
    echo 'Conexión exitosa a la base de datos<br>';
} else {
    echo 'Error en la conexión a la base de datos<br>';
}

$json = file_get_contents('php://input');
echo "JSON recibido: $json<br>";

$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error al decodificar JSON: ' . json_last_error_msg() . '<br>';
    exit;
}

$datos = isset($data['details']) ? $data['details'] : null;

if (is_array($datos)) {
    $id_transaccion = isset($datos['id']) ? $datos['id'] : null;
    $total = isset($datos['purchase_units'][0]['amount']['value']) ? $datos['purchase_units'][0]['amount']['value'] : null;
    $status = isset($datos['status']) ? $datos['status'] : null;
    $fecha = isset($datos['update_time']) ? $datos['update_time'] : null;
    $fecha_nueva = $fecha ? date('Y-m-d H:i:s', strtotime($fecha)) : null;
    $email = isset($datos['payer']['email_address']) ? $datos['payer']['email_address'] : null;
    $id_cliente = isset($datos['payer']['payer_id']) ? $datos['payer']['payer_id'] : null;

    if ($id_transaccion && $total && $status && $fecha_nueva && $email && $id_cliente) {
        try {
            $sql = $con->prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente, total) VALUES (?, ?, ?, ?, ?, ?)");
            $result = $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);

            if ($result) {
                echo 'Datos guardados correctamente<br>';
                $id = $con->lastInsertId(); // Obtener el ID de la última inserción
            } else {
                echo 'Error al guardar los datos<br>';
                print_r($sql->errorInfo());
                exit;
            }
        } catch (PDOException $e) {
            echo 'Error en la consulta: ' . $e->getMessage();
            exit;
        }
    }

    if (isset($id) && $id > 0) {
        $producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if ($producto != null) {
            foreach ($producto as $clave => $cantidad) {
                $sql = $con->prepare("SELECT id, nombre, precio FROM producto WHERE id=?");
                $sql->execute([$clave]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);

                $nombre = $row_prod['nombre'];
                $precio = $row_prod['precio'];
                $cantidad = $cantidad;

                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES (?, ?, ?, ?, ?)");
                $sql_insert->execute([$id, $clave, $row_prod['nombre'], $row_prod['precio'], $cantidad]);
            }
        }
        unset($_SESSION['carrito']);
    }
} else {
    echo 'Error: Datos recibidos no son un array<br>';
}
