<?php

require 'config/database.php';
require 'config/config.php';
require 'clienteFunciones.php';


$errors = [];

$db = new Database();
$con = $db->conectar();

if (!empty($_POST)) {
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $dni = trim($_POST['dni']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if (esNulo([$nombres, $apellidos, $email, $telefono, $dni, $usuario, $password, $repassword])) {
        $errors[] = "Debe llenar todos los campos";
    }

    if (esEmail([$email])) {
        $errors[] = "La dirección de correo no es válida";
    }

    if (!validaPassword($password, $repassword)) {
        $errors[] = "Las contraseñas no coinciden";
    }

    if (existeUsuario($usuario, $con)) {
        $errors[] = "El nombre del usuario $usuario ya existe";
    }

    if (emailExiste($email, $con)) {
        $errors[] = "El correo electrónico $email ya existe";
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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .text-danger {
            color: red;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.realizar-registro-btn {
            background-color: #A0C3D2;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        button.realizar-registro-btn:hover {
            background-color: #A0C3D2;
        }

        .note {
            text-align: center;
            margin: 10px 0;
            color: #555;
        }

        .alerta {
            padding: 20px;
            background-color: #A0C3D2;
            /* Rojo */
            color: blanco;
            margin-bottom: 15px;
            position: relative;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cerrar {
            margin-left: 15px;
            color: blanco;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .cerrar:hover {
            color: negro;
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
                <a href="index.php"><img src="img/logo2.png" alt="" width="150PX"></a>
            </div>
            <div class="nav_options">
                <ul>
                    <li><a href="index.php">INICIO</a></li>
                    <li><a href="productos.php">PRODUCTOS</a></li>
                    <li><a href="nosotros.php">NUESTRA EMPRESA</a></li>
                    <li><a href="politica_priv.php">POLÍTICA DE PRIVACIDAD</a></li>
                    <li><a href="terminos_condiciones.php">TÉRMINOS Y CONDICIONES</a></li>
                    <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i> CARRITO <span id="num_cart"><?php echo $num_cart; ?></span></a></li>
                    <?php if (isset($_SESSION['user_name'])) { ?>
                        <li><a href="#"><i class="fas fa-user"></i> <span id="user_name"><?php echo $_SESSION['user_name']; ?></span></a></li>
                    <?php } else { ?>
                        <li><a href="login.php"><i class="fas fa-user"></i> LOGIN</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">


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