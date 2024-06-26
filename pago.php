<?php
require 'config/database.php';
require 'config/config.php';

// Tasa de conversión de CLP a USD
$conversion_rate = 1 / 947.14;

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();

if ($producto != null) {
    foreach ($producto as $clave => $cantidad) {
        $sql = $con->prepare("SELECT id, nombre, img, precio, $cantidad as cantidad FROM producto WHERE id=?");
        $sql->execute([$clave]);
        $producto = $sql->fetch(PDO::FETCH_ASSOC);

        if ($producto) {
            $producto['cantidad'] = $cantidad;
            $lista_carrito[] = $producto;
        }
    }
} else {
    header("Location: index.php");
    exit;
}

$total_general_clp = 0;
foreach ($lista_carrito as $producto) {
    $total_general_clp += $producto['cantidad'] * $producto['precio'];
}

// Convertir total de CLP a USD
$total_general_usd = $total_general_clp * $conversion_rate;
$con = null;
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
        .contenedor-items {
            margin-top: 20px;
        }

        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
            float: right;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9e9e9;
        }

        input[type="number"] {
            width: 50px;
            text-align: center;
        }

        h3#total_general {
            font-size: 24px;
            text-align: center;
            margin-top: 10px;
        }

        button.realizar-pago-btn {
            background-color: #A0C3D2;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button.realizar-pago-btn:hover {
            background-color: #A0C3D2;
        }

        footer {
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
        }

        #paypal-button-container {
            float: left;
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
        <section class="contenedor">
            <div class="contenedor-items">
                <div>
                    <div>
                        <h1>Detalles de Pago</h1>
                        <div id="paypal-button-container"></div>
                    </div>
                    <div>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($lista_carrito)) : ?>
                                        <tr>
                                            <td colspan="5"><b>Lista Vacía</b></td>
                                        </tr>
                                        <?php else :
                                        foreach ($lista_carrito as $producto) :
                                            $_id = $producto['id'];
                                            $nombre = $producto['nombre'];
                                            $precio = $producto['precio'];
                                            $cantidad = $producto['cantidad'];
                                            $total = $cantidad * $precio;
                                        ?>
                                            <tr>
                                                <td><?php echo $nombre; ?></td>
                                                <td id="total_<?php echo $_id; ?>" name="total[]"><?php echo MONEDA . number_format($total, 0, ',', '.'); ?></td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td colspan="1">
                                            <h3 id="total_general" name="total_general[]"><?php echo MONEDA . number_format($total_general_clp, 0, ',', '.'); ?> </h3>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'pay',
                },

                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            "amount": {
                                "currency_code": "USD",
                                "value": <?php echo number_format($total_general_usd, 2, '.', ''); ?>
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        console.log(details);

                        let url = 'captura.php';

                        return fetch(url, {
                            method: 'post',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                details: details
                            })
                        })
                    });
                },

                onCancel: function(data) {
                    alert("Pago Cancelado");
                    console.log(data);
                },

                onError: function(err) {
                    console.error('Ocurrió un error durante el proceso de pago: ', err);
                }

            }).render('#paypal-button-container');
        }
        initPayPalButton();
    </script>

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