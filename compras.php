<?php

require 'config/database.php';
require 'config/config.php';
require 'clienteFunciones.php';

$db = new Database();
$con = $db->conectar();

$token = generarToken();
$_SESSION['token'] = $token;
$idCliente = $_SESSION['user_cliente'];

$sql = $con->prepare("SELECT id_transaccion, fecha, status, total FROM compra WHERE
id_cliente = ? ORDER BY DATE(fecha) DESC");
$sql->execute([$idCliente]);

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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }



        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-family: Arial, sans-serif;
            color: #333;
            padding-bottom: 10px;
        }

        .card-text {
            margin-bottom: 15px;
            font-size: 1rem;
            color: #6c757d;
        }

        button.ver-compra-btn {
            background-color: #A0C3D2;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button.ver-compra-btn:hover {
            background-color: #A0C3D2;
        }

        footer {
            width: 100%;
            padding: 10px 0;
            text-align: center;
            bottom: 0;
        }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>

    <main>
        <div class="container">
            <h2>Mis Compras</h2>

            <?php while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="card">
                    <div class="card-body">
                        <p class="card-title"><strong>Fecha: </strong> <?php echo $row['fecha']; ?></p>
                        <p class="card-title"><strong>Folio: </strong><?php echo $row['id_transaccion']; ?></p>
                        <p class="card-title"><strong>Total: </strong><?php echo MONEDA . number_format($row['total'], 2, ',', '.');; ?></p>
                        <br><button onclick="location.href='compra_detalle.php?orden=<?php echo $row['id_transaccion']; ?>&token=<?php echo $token; ?>'" class="ver-compra-btn">Ver Compra</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <!-- Footer -->
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