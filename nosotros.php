<?php
require 'config/database.php';
require 'config/config.php';
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

    <!--Aqui comienza sobre nosotros-->

    <h1 class="tpolpriv flash">¡Bienvenidos a "Arena para Gatos"!</h1>
    <div class="seccion_polpriv fadeInUp">
        <p>En "Arena para Gatos", entendemos que tu felino es más que una mascota: es un miembro querido de tu familia.
            Por eso, nos dedicamos a ofrecerte las mejores soluciones para mantener su higiene y bienestar, garantizando
            un hogar limpio y feliz para ambos.</p>
        <p>En un mundo donde la calidad de vida de nuestras mascotas es cada vez más importante, en "Arena para Gatos"
            nos enorgullece proporcionar productos que cumplen con los más altos estándares de calidad.</p>
        <p>Nos comprometemos a ofrecerte no solo arena para gatos que mantiene limpios los espacios de tus mascotas,
            sino también que promueve su salud y felicidad. Con una amplia gama de opciones, desde variedades con o sin
            perfume hasta fórmulas aglomerantes de última generación, nos esforzamos por satisfacer las necesidades
            individuales de cada dueño y su gato.</p>
        <p>Nuestro equipo está dedicado a brindarte un servicio excepcional, garantizando entregas eficientes y rápidas
            para que siempre tengas la arena que necesitas, cuando la necesitas.</p>
        <p>En "Arena para Gatos", sabemos que tu tiempo y la felicidad de tu gato son lo más importante. ¡Únete a
            nosotros y descubre cómo podemos hacer que la limpieza sea una experiencia fácil y agradable para ti y tu
            compañero felino!</p>

        <h2>Sobre Nosotros</h2>
        <p>"Arena para Gatos" es una empresa comprometida con el bienestar de las mascotas y la comodidad de sus dueños.
            Fundada en 2024, nuestra empresa se ha dedicado a proporcionar soluciones innovadoras y de alta calidad para
            la higiene de los gatos.</p>
        <p>Desde nuestros inicios, nos hemos destacado por ofrecer una amplia gama de opciones de arena para gatos,
            adaptadas a las necesidades y preferencias tanto de los felinos como de sus cuidadores. Nuestra misión es
            proporcionar productos que no solo mantengan limpios los espacios de tus mascotas, sino que también
            promuevan su salud y bienestar.</p>
        <p>Con un equipo dedicado y apasionado, en "Arena para Gatos" nos esforzamos por ofrecer un servicio excepcional
            a nuestros clientes. Desde el momento en que realizas tu pedido hasta que recibes tu producto, nos
            aseguramos de que la experiencia sea fácil, rápida y satisfactoria.</p>

        <h2>Oportunidad del Proyecto</h2>
        <p>El proyecto "Arena para Gatos" surge en un momento crucial en el mercado de productos para mascotas. En la
            última década, ha habido un aumento significativo en la conciencia sobre la calidad de vida de los animales
            de compañía, lo que ha llevado a un crecimiento en la demanda de productos de alta calidad y conveniencia
            para el cuidado de las mascotas.</p>
        <p>En particular, el mercado de arena para gatos ha experimentado un rápido crecimiento, con una creciente
            preferencia por productos que no solo sean efectivos en la absorción de olores y líquidos, sino también
            respetuosos con el medio ambiente y seguros para la salud de los gatos.</p>
        <p>La oportunidad de "Arena para Gatos" se centra en llenar este espacio en el mercado, ofreciendo una amplia
            variedad de opciones de arena para gatos que cumplan con los más altos estándares de calidad y satisfagan
            las necesidades específicas de los dueños y sus mascotas. Con un enfoque en la innovación, la calidad y el
            servicio al cliente, estamos posicionados para capitalizar esta creciente demanda y convertirnos en el líder
            del mercado en el cuidado de la higiene de los gatos.</p>


    </div>
    <!--Aqui termina los terminos y condiciones-->

    <!-- Inicio de footer -->
    <footer class="fadeInUp">
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
    <!-- Aquí termina el footer -->

</body>

</html>