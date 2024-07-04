<?php
require 'config/database.php';
require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';

if ($id_transaccion == '') {
    $error = 'Error al procesar la petición';
} else {
    $sql = $con->prepare("SELECT count(id) FROM compra WHERE id_transaccion = ? AND status=?");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    if ($sql->fetchColumn() > 0) {
        $sql = $con->prepare("SELECT id, fecha, email, total FROM compra WHERE id_transaccion = ? AND status=? LIMIT 1");
        $sql->execute([$id_transaccion, 'COMPLETED']);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $idCompra = $row['id'];
        $total = $row['total'];
        $fecha = $row['fecha'];

        $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
        $sqlDet->execute([$idCompra]);
    } else {
        $error = 'Error al comprobar la compra';
    }
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Arena para Gatos</title>
    <meta name="description" content="Tienda en línea de arena para gatos.">
    <meta name="keywords" content="arena para gatos, tienda de mascotas, productos para gatos">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .col {
            flex: 1;
            padding: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table thead {
            background: #333;
            color: #333;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #dddddd;
            text-align: center;
        }

        .table th {
            background: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        .table tbody tr:hover {
            background: #e9e9e9;
        }

        footer {
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="fadeIn">
            <div class="img_brand">
                <img src="img/logo2.png" alt="Logo de la tienda" width="150px">
            </div>
            <div class="nav_options">
                <ul>
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="productos.php">PRODUCTOS</a></li>
                    <li><a href="nosotros.php">NUESTRA EMPRESA</a></li>
                    <li><a href="politica_priv.php">POLÍTICA DE PRIVACIDAD</a></li>
                    <li><a href="terminos_condiciones.php">TÉRMINOS Y CONDICIONES</a></li>
                    <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i> CARRITO <span id="num_cart"><?php echo $num_cart; ?></span></a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <?php if (!empty($error)) { ?>
                <div class="row">
                    <div class="col">
                        <h3><?php echo $error; ?></h3>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col">
                        <b>Folio de la compra: </b><?php echo $id_transaccion; ?><br>
                        <b>Fecha de la compra: </b><?php echo $fecha; ?><br>
                        <b>Total de la compra: </b><?php echo MONEDA . number_format($total, 2, '.', ','); ?><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {
                                    $importe = $row_det['precio'] * $row_det['cantidad'];?>
                                    <tr>
                                        <th><?php echo $row_det['cantidad']; ?></th>
                                        <th><?php echo $row_det['nombre']; ?></th>
                                        <th><?php echo MONEDA . number_format($importe, 0, ',', '.'); ?></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer>
        <div class="option">
            <ul>
                <li><a href="politica_priv.php">©2024 Company. Política de Privacidad</a></li>
                <li><a href="terminos_condiciones.php">| Términos & Condiciones</a></li>
            </ul>
        </div>
        <div class="logos">
            <div class="icon_img">
                <a href="http://www.facebook.com" target="_blank"><img src="images/facebook.svg" alt="Facebook"></a>
            </div>
            <div class="icon_img">
                <a href="http://www.twitter.com" target="_blank"><img src="images/twitter.svg" alt="Twitter"></a>
            </div>
            <div class="icon_img">
                <a href="http://www.instagram.com" target="_blank"><img src="images/insta.svg" alt="Instagram"></a>
            </div>
            <div class="icon_img">
                <a href="https://www.youtube.com/" target="_blank"><img src="images/youtube.svg" alt="YouTube"></a>
            </div>
        </div>
    </footer>
</body>

</html>