<?php

require 'config/database.php';
require 'config/config.php';
require 'clienteFunciones.php';


$errors = [];

$db = new Database();
$con = $db->conectar();

$proceso = isset($_GET['pago']) ? 'pago' : 'login';

if (!empty($_POST)) {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);
    $proceso = $_POST['proceso'] ?? 'login';

    if (esNulo([$usuario, $password])) {
        $errors[] = "Debe llenar todos los campos";
    }

    if (count($errors) == 0) {
        $errors[] = login($usuario, $password, $con, $proceso);
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .text-danger {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        footer {
            width: 100%;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
        }

        .form-login {
            max-width: 350px;
        }

        button.realizar-login-btn {
            background-color: #A0C3D2;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            border: none;
            border-radius: 4px;
            width: 100%;
            padding: 10px;
        }

        button.realizar-login-btn:hover {
            background-color: #A0C3D2;
        }

        .note {
            text-align: center;
            margin-top: 15px;
            color: #555;
        }

        .error-messages {
            margin-bottom: 15px;
        }

        .error-messages p {
            color: red;
            margin: 5px 0;
        }

        .error-messages ul {
            list-style: none;
            padding: 0;
        }

        .error-messages li {
            color: red;
        }
    </style>
</head>

<body>
    <?php include 'menu.php'; ?>

    <main class="container">

        <h1>Inicia sesión</h1>

        <?php if (!empty($errors)) : ?>
            <div class="error-messages">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="login.php" method="post" autocomplete="off">

            <input type="hidden" name="proceso" value="<?php echo $proceso; ?>">

            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input class="form-control" type=text name="usuario" id="usuario" placeholder="usuario" required>
            </div><br>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input class="form-control" type=password name="password" id="password" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
                <a href="recupera.php">¿Olvidaste tu contraseña?</a>
            </div>

            <div>
                <br><button type="submit" class="realizar-login-btn">Ingresar</button>
            </div>

            <hr>

            <div class="note">
                ¿No tienes cuenta? <a href="registro.php">Registrate aquí</a>
            </div>
        </form>

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