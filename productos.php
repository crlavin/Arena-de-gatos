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
</head>

<body>
    <?php include 'menu.php'; ?>
    <!-- Main Content -->
    <main>
        <section class="contenedor">
            <div class="contenedor-items">
                <?php

                try {
                    $db = new Database();
                    $con = $db->conectar();
                    $sql = $con->prepare("SELECT id, nombre, img, precio FROM producto");
                    $sql->execute();
                    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

                    if ($resultados) {
                        foreach ($resultados as $producto) {
                            $id = $producto['id'];
                            $nombre = $producto['nombre'];
                            $img = $producto['img'];
                            $precio = $producto['precio'];
                            $precio_formateado = number_format($precio, 0, ',', '.');
                            $token = hash_hmac('sha1', $id, KEY_TOKEN);

                            echo '<div class="item">';
                            echo "<span class='titulo-item'>$nombre</span>";
                            echo "<img src='$img' alt='Imagen de $nombre' class='img-item'>";
                            echo "<span class='precio-item' data-precio='$precio'>$$precio_formateado</span>";
                            echo "<button class='boton-item' onclick=\"addProducto($id, '$token')\">Agregar al Carrito</button>";
                            echo "<button class='boton-item' onclick=\"location.href='detalles.php?id=$id&token=$token'\">Detalles</button>";
                            echo '</div>';
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }

                    $con = null;
                } catch (PDOException $e) {
                    error_log("Database Error: " . $e->getMessage());
                    echo "Ocurrió un error al recuperar los productos.";
                }
                ?>

        </section>
    </main>
    <script>
        function addProducto(id, token) {
            let url = 'carrito.php';
            let formData = new FormData();
            formData.append('id', id);
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