<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Arena para Gatos</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/mobile.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/app.js" async></script>
</head>

<body>
    <!-- Aqui comienza Nav Bar -->
    <nav class="fadeIn">
        <div class="img_brand">
            <img src="img/logo2.png" alt="" width="150PX">
        </div>
        <div class="nav_options">
            <ul>
                <li><a href="index.php">INICIO</a></li>
                <li><a href="productos.php">PRODUCTOS</a></li>
                <li><a href="nosotros.php">NUESTRA EMPRESA</a></li>
                <li><a href="politica_priv.php">POLITICA DE PRIVACIDAD</a></li>
                <li><a href="terminos_condiciones.php">TERMINOS Y CONDICIONES</a></li>
            </ul>
        </div>
    </nav>
    <!-- Aqui acaba Nav Bar -->

    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            <?php
            // Incluir el archivo de configuración de la base de datos
            require 'config/database.php';

            try {
                // Crear una instancia de la clase Database
                $db = new Database();

                // Conectar a la base de datos
                $con = $db->conectar();

                // Preparar la consulta SQL
                $sql = $con->prepare("SELECT id_producto, nombre, descripcion, precio FROM producto");

                // Ejecutar la consulta
                $sql->execute();

                // Obtener todos los resultados como un array asociativo
                $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

                // Verificar si hay resultados
                if ($resultados) {
                    // Iterar sobre los resultados y mostrar la información de cada producto
                    foreach ($resultados as $producto) {
                        $id = $producto['id_producto'];
                        $nombre = $producto['nombre'];
                        $descripcion = $producto['descripcion'];
                        $precio = $producto['precio'];

                        // Formatear el precio (agregar separadores de miles)
                        $precio_formateado = number_format($precio, 0, ',', '.');

                        // Mostrar el producto dentro del bucle
                        echo '<div class="item">';
                        echo "<span class='titulo-item'>$nombre</span>";
                        echo "<img src='$descripcion' alt='' class='img-item'>";
                        echo "<span class='precio-item'>$$precio_formateado</span>";
                        echo "<button class='boton-item'>Agregar al Carrito</button>";
                        echo '</div>';
                    }
                } else {
                    echo "No se encontraron productos.";
                }

                // Cerrar la conexión
                $con = null;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </div>

        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $120.000
                    </span>
                </div>
                <!-- Botón de Pagar -->
                <button class="btn-pagar" onclick="crearTransaccion()">Pagar <i class="fa-solid fa-bag-shopping"></i></button>

               </div>
        </div>
    </section>
    <!-- Termina seccion de top productos -->
    <!-- Inicio de footer -->
    <footer>
        <div class="option">
            <ul>
                <li><a href="politica_priv.html">©2024 Company. Política de Privacidad</a></li>
                <li><a href="terminos_condiciones.html">| Términos & Condiciones.</a></li>
            </ul>
        </div>
        <div class="logos">
            <div class="icon_img">
                <a href="http://www.facebook.com" target="_blank"><img src="images/facebook.svg" alt=""></a>
            </div>
            <div class="icon_img">
                <a href="http://www.twitter.com" target="_blank"><img src="images/twitter.svg" alt=""></a>
            </div>
            <div class="icon_img">
                <a href="http://www.instagram.com" target="_blank"><img src="images/insta.svg" alt=""></a>
            </div>
            <div class="icon_img">
                <a href="https://www.youtube.com/" target="_blank"><img src="images/youtube.svg" alt=""></a>
            </div>
        </div>
    </footer>

</body>

</html>