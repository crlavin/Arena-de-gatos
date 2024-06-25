<?php
require 'config/database.php';
require 'config/config.php';

// Crear una instancia de la clase Database
$db = new Database();

// Conectar a la base de datos
$con = $db->conectar();

// Preparar la consulta SQL
$sql = $con->prepare("SELECT id, nombre, precio FROM producto");

// Ejecutar la consulta
$sql->execute();

// Obtener todos los resultados
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

// Cerrar la conexión
$con = null;

?>


<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Arena para Gatos</title>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <!-- stylesheet se refiere a la hoja de estilos, esto hace que agarre la info de esta misma -->
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <link rel="stylesheet" type="text/css" href="css/animation.css">
  <link rel="stylesheet" type="text/html" href="productos.php">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i> CARRITO <span id="num_cart"><?php echo $num_cart; ?></span></a></li>
      </ul>
    </div>
  </nav>
  <!-- Aqui acaba Nav Bar -->


  <!-- Aqui comienza main section -->
  <div class="main_section fadeInDown">
    <h3 class="tmain3">ES</h3>
    <h1 class="tmain1">PERFECTO</1>
      <h2 class="tmain2">PARA TI</h2>
  </div>
  </div>

  <div class="img_main fadeInUp">
    <img src="images/img_main2.svg" alt="">
  </div>

  <!-- Aqui termina la main seccion -->


  <!-- Aqui comienza la seccion de ventajas -->

  <div class="beneficios_titulo click">
    <h2 class="tbeneficios2">Porque nosotros somos muy</h2>
    <h1 class="tbeneficios1">FORMIDABLES</h1>
  </div>

  <div class="beneficios">
    <div class="beneficio cartel">
      <img src="images/beneficios1.svg" alt="">
      <h3 class="tbeneficios3">ENVIOS GRATIS</h3>
      <p class="text_beneficio"> a todo Chile
      </p>
    </div>

    <div class="beneficio cartel">
      <img src="images/beneficios2.svg" alt="">
      <h3 class="tbeneficios3">ECOLOGIA AMIGABLE</h3>
      <p class="text_beneficio"> porque le debemos
        <br>dejar un mundo limpio
        <br>a nuestros gatitos
      </p>
    </div>

    <div class="beneficio cartel">
      <img src="images/beneficios3.svg" alt="">
      <h3 class="tbeneficios3">PURR GARANTIZADO</h3>
      <p class="text_beneficio"> tendras a tu gato feliz
      </p>
    </div>
  </div>

  <!-- Aqui termina la seccion de ventajas -->

  <!-- Inicio seccion de top productos -->
  <h1 class="ttopproductos fadeInDown">TOP PRODUCTOS</h1>
  <div class="granproducts">
    <div class="products fadeInUp">

      <div class="product">
        <div class="content">
          <div class="img_content">
            <img src="img/Arena-para-gatos-Aglomerante.jpg" width="250px">
          </div>
          <div class=" topprod_text">
            <h2>Arena Aglomerante 20kg</h2>
            <p class="topprod_precio">$19.990</p>
          </div>
          <a class="main_button">COMPRAR</a>
        </div>
      </div>


      <div class="product">
        <div class="content">
          <div class="img_content">
            <img src="img/arena-sanitaria-lavanda.png" alt="" width="250px">
          </div>
          <div class=" topprod_text">
            <h2>Arena Sanitaria Lavanda 8kg</h2>
            <p class="topprod_precio">$7.990</p>
          </div>
          <a class="main_button">COMPRAR</a>
        </div>
      </div>

      <div class="product">
        <div class="content">
          <div class="img_content">
            <img src="img/arena-mineral.jpg" alt="" width="250px">
          </div>
          <div class=" topprod_text">
            <h2>Arena Mineral 4kg</h2>
            <p class="topprod_precio">$4.990</p>
          </div>
          <a class="main_button">COMPRAR</a>
        </div>
      </div>
    </div>

    <a href="productos.php" class="showmore_button">MAS PRODUCTOS</a>
  </div>

  <!-- Termina seccion de top productos -->


  <!-- Inicio de menciones -->

  <div class="group_mencion">
    <div class="menciones_titulo click">
      <h2 class="tmenciones2">te gustaria la opinion de un experto?</h2>
      <h1 class="tmenciones1">CONOCE A NUESTROS CLIENTES!</h1>
    </div>
    <div class="menciones ">

      <div class="mencion flash">
        <div class="content_img">
          <img src="images/mencion1.svg" alt="">
        </div>
        <div class="content_mencion">
          <h1 class="title_mencion">Salem</h1>
          <p>Si, supongo que sus
            <br>productos son competentes;
            <br>digo, todavía no tienen
            <br>lo que necesito
            <br>para conquistar al mundo
            <br>pero sus arenas
            <br>para gatos son lo
            <br>mejor del mercado.
          </p>
        </div>
      </div>

      <div class="mencion flash">
        <div class="content_img">
          <img src="images/mencion2.svg" alt="">
        </div>
        <div class="content_mencion">
          <h1 class="title_mencion">Garfield</h1>
          <p> Es cierto, que tienen
            <br>unas arenas para gatos
            <br>muy reconfortantes
            <br>calidas y suaves
            <br>su aroma a lavanda
            <br>me encanta!
            <br>y bueno, ahora
            <br>tengo ganas de
            <br>una lasaña.
          </p>
        </div>
      </div>

      <div class="mencion flash">
        <div class="content_img">
          <img src="images/mencion4.svg" alt="">
        </div>
        <div class="content_mencion">
          <h1 class="title_mencion">Bola de nieve</h1>
          <p> ¿Sabes por qué
            <br>me encanta
            <br>la arena para gatos?
            <br>Porque ¡es como un spa
            <br>para mis patitas!
            <br>¡La sensación entre mis dedos.
            <br>es purrr-fecta!"
            <br>
          </p>
        </div>
      </div>

    </div>
  </div>
  <!-- Aqui termina la seccion de menciones -->

  <!-- Inicio de footer -->
  <footer>
    <div class="option">
      <ul>
        <li><a href="politica_priv.php">©2024 Company. Política de Privacidad</a></li>
        <li><a href="terminos_condiciones.php">| Términos & Condiciones.</a></li>
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