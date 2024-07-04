<?php
require 'config/database.php';
require 'config/config.php';
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
        .contenedor {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .contenedor-items img {
            max-width: 100%;
            height: auto;
        }

        .contenedor-items {
            justify-content: center;
            align-items: center;


        }

        .contenedor-items button {
            display: block;
            border: none;
            background-color: #A0C3D2;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
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
                <?php

                try {
                    $db = new Database();
                    $con = $db->conectar();

                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                    $token = isset($_GET['token']) ? $_GET['token'] : '';

                    if (empty($id) || empty($token)) {
                        throw new Exception('Error: Parámetros no válidos');
                    }

                    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

                    if ($token !== $token_tmp) {
                        throw new Exception('Error: Token no válido');
                    }

                    $sql = $con->prepare("SELECT nombre, precio, descripcion, img, stock FROM producto WHERE id = ? LIMIT 1");
                    $sql->execute([$id]);
                    $producto = $sql->fetch(PDO::FETCH_ASSOC);

                    if (!$producto) {
                        throw new Exception('Error: Producto no encontrado');
                    }

                    $nombre = $producto['nombre'];
                    $img = $producto['img'];
                    $precio = $producto['precio'];
                    $precio_formateado = number_format($precio, 0, ',', '.');
                    $descripcion = $producto['descripcion'];
                    $stock = $producto['stock'];

                    echo "<img src='$img' alt='Imagen de $nombre'>";
                    echo '<div>';
                    echo "<h1>$nombre</h1>";
                    echo "<h3>$descripcion</h3>";
                    echo "<h1 data-precio='$precio'>$ $precio_formateado</h1>";
                    echo "<h3>Stock: $stock Unidades.</h3>";
                    echo "<div class='col-3 my-3'>";
                    echo "<h3>Cantidad: <input class='form-control' id='cantidad' name='cantidad' type='number' min='1' max='99' value='1'></h3>";
                    echo "</div>";
                    echo "<br>";
                    echo "<button class='boton-item' onclick=\"location.href='checkout.php?id=$id&token=$token'\">Comprar ahora</button>";
                    echo "<br>";
                    echo "<button onclick=\"addProducto($id, document.getElementById('cantidad').value, '$token')\">Agregar al Carrito</button>";
                    echo '</div>';

                    $con = null;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                ?>
            </div>
        </section>
    </main>
    <script>
        function addProducto(id, cantidad, token) {
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id', id);
            formData.append('cantidad', cantidad);
            formData.append('token', token);

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
                        let elemento = document.getElementById("num_cart");
                        elemento.innerHTML = data.numero;
                    }
                }).catch(error => {
                    console.error('Error:', error.message);
                });
        }
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