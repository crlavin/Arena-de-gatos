<?php
require 'config/database.php';
require 'config/config.php';

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();

if ($producto != null) {
    foreach ($producto as $clave => $cantidad) { // Corregido: $producto a $productos
        $sql = $con->prepare("SELECT id, nombre, img, precio, $cantidad as cantidad FROM producto WHERE id=?");
        $sql->execute([$clave]);
        $producto = $sql->fetch(PDO::FETCH_ASSOC); // Cambiado a $producto

        // Agregamos cantidad al array $producto obtenido de la base de datos
        if ($producto) {
            $producto['cantidad'] = $cantidad; // Agrega la cantidad al producto
            $lista_carrito[] = $producto; // Añade el producto al carrito
        }
    }
}
$total_general = 0;
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
            /* Ajusta el margen superior según sea necesario */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            /* Espacio inferior entre la tabla y el botón */
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
            /* Tamaño de fuente más grande */
            text-align: center;
            /* Alineación a la derecha */
            margin-top: 10px;
            /* Espacio superior */

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
    </style>
</head>

<body>
    <!-- Navigation Bar -->
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

    <!-- Main Content -->
    <main>
        <section class="contenedor">
            <div class="contenedor-items">
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($lista_carrito)) : ?>
                                <tr>
                                    <td colspan="5"><b>Lista Vacía</b></td>
                                </tr>
                                <?php else :
                                $total_general = 0;
                                foreach ($lista_carrito as $producto) :
                                    $_id = $producto['id'];
                                    $nombre = $producto['nombre'];
                                    $precio = $producto['precio'];
                                    $cantidad = $producto['cantidad'];
                                    $total = $cantidad * $precio;
                                    $total_general += $total;
                                ?>
                                    <tr>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo MONEDA . number_format($precio, 0, ',', '.'); ?></td>
                                        <td>
                                            <input type="number" min="1" max="99" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)">
                                        </td>
                                        <td id="total_<?php echo $_id; ?>" name="total[]"><?php echo MONEDA . number_format($total, 0, ',', '.'); ?></td>
                                        <td><button class="realizar-pago-btn" onclick="eliminarProducto(<?php echo $_id; ?>)">Eliminar</button></td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="1">
                                    <h3 id="total_general" name="total_general[]"><?php echo MONEDA . number_format($total_general, 0, ',', '.'); ?> </h3>
                                </td>
                                <td colspan="1"></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if ($lista_carrito != null) { ?>
                        <div style="text-align: right;">
                            <button onclick="location.href='pago.php'" class="realizar-pago-btn">Realizar Pago</button>
                        </div>
                </div>
            <?php } ?>
        </section>
    </main>

    <script>
        function actualizaCantidad(cantidad, id) {
            let url = 'actualizar_carrito.php';
            let formData = new FormData();
            formData.append('action', 'agregar');
            formData.append('id', id);
            formData.append('cantidad', cantidad);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error('Network response was not ok: ' + text);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.ok) {
                        let divtotal = document.getElementById("total_" + id);
                        if (divtotal) {
                            divtotal.innerHTML = data.sub;
                        } else {
                            console.error('Element with ID total_' + id + ' not found.');
                        }

                        let total = 0;
                        let list = document.getElementsByName("total[]");

                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[^\d]/g, ''));
                        }

                        total = new Intl.NumberFormat('es-CL', {
                            style: 'currency',
                            currency: 'CLP',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(total);

                        document.getElementById('total_general').innerHTML = total;
                    }
                }).catch(error => {
                    console.error('Error:', error.message);
                });
        }
    </script>
    <script>
        function eliminarProducto(id) {
            let url = 'eliminar_carrito.php';
            let formData = new FormData();
            formData.append('id', id);

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error('Network response was not ok: ' + text);
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.ok) {
                        location.reload(); // Recarga la página para actualizar el carrito
                    }
                }).catch(error => {
                    console.error('Error:', error.message);
                });
        }
    </script>


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