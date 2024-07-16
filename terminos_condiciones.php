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
    <?php include 'menu.php'; ?>

    <!--Aqui comienza los terminos y condiciones-->
    <h1 class="ttercon flash">Terminos y condiciones</h1>
    <div class="terminos_cond fadeInUp">


        <body>

            <h2>1. Términos</h2>
            <p>Al acceder al sitio web en arenaparagatos.cl, usted acepta estar vinculado por
                estos términos de servicio, todas las leyes y regulaciones aplicables, y acepta que usted es
                responsable del cumplimiento de las leyes locales aplicables. Si no está de acuerdo con alguno de
                estos términos, se le prohíbe utilizar o acceder a este sitio. Los materiales contenidos en este
                sitio web están protegidos por las leyes de derechos de autor y marcas aplicables.</p>

            <h2>2. Licencia de Uso</h2>
            <p>Se concede permiso para descargar temporalmente una copia de los materiales (información o software)
                en el sitio web arenaparagatos.cl para la visualización transitoria personal y no
                comercial solamente. Esta es la concesión de una licencia, no una transferencia de título, y bajo
                esta licencia usted no puede:</p>
            <ul>
                <li>Modificar o copiar los materiales;</li>
                <li>Utilizar los materiales para cualquier propósito comercial, o para cualquier exhibición pública
                    (comercial o no comercial);</li>
                <li>Intentar descompilar o realizar ingeniería inversa de cualquier software contenido en el sitio
                    web de arenaparagatos.cl;</li>
                <li>Eliminar cualquier derecho de autor u otras anotaciones propietarias de los materiales; o</li>
                <li>Transferir los materiales a otra persona o «reflejar» los materiales en cualquier otro servidor.
                </li>
            </ul>
            <p>Esta licencia se terminará automáticamente si usted viola cualquiera de estas restricciones y puede
                ser terminada por arenaparagatos.cl en cualquier momento. Al terminar su
                visualización de estos materiales o al finalizar esta licencia, debe destruir cualquier material
                descargado en su posesión ya sea en formato electrónico o impreso.</p>

            <h2>3. Responsabilidad</h2>
            <p>Los materiales del sitio web de arenaparagatos.cl se proporcionan «tal cual».
                arenaparagatos.cl no otorga ninguna garantía, expresa o implícita, y por la
                presente renuncia y niega todas las demás garantías, incluyendo, sin limitación, garantías
                implícitas o condiciones de comerciabilidad, idoneidad para un propósito en particular, o no
                infracción de propiedad intelectual u otra violación de derechos. Además,
                arenaparagatos.cl no garantiza ni hace ninguna representación con respecto a la
                exactitud, los resultados probables, o la confiabilidad del uso de los materiales en su sitio web o
                de otra manera relacionado con tales materiales o en cualquier sitio vinculado a este lugar.</p>

            <h2>4. Limitaciones</h2>
            <p>En ningún caso arenaparagatos.cl o sus proveedores serán responsables de ningún
                daño (incluyendo, sin limitación, daños por pérdida de datos o beneficio, o debido a la interrupción
                del negocio) que surjan del uso o la incapacidad de utilizar los materiales en el sitio web de
                arenaparagatos.cl, incluso si arenaparagatos.cl o un
                representante autorizado de arenaparagatos.cl ha sido notificado verbalmente o
                por escrito de la posibilidad de tal daño. Debido a que algunas jurisdicciones no permiten
                limitaciones a las garantías implícitas, o limitaciones de responsabilidad por daños consecuentes o
                incidentales, es posible que estas limitaciones no se apliquen a usted.</p>

            <h2>5. Exactitud de Materiales</h2>
            <p>Los materiales que aparecen en el sitio web de arenaparagatos.cl pueden incluir
                errores técnicos, tipográficos o fotográficos. arenaparagatos.cl no garantiza que
                cualquiera de los materiales en su sitio web sean exactos, completos o actuales.
                arenaparagatos.cl puede realizar cambios en los materiales contenidos en su sitio
                web en cualquier momento sin previo aviso. Sin embargo, arenaparagatos.cl no se
                compromete a actualizar los materiales.</p>

            <h2>6. Enlaces</h2>
            <p>arenaparagatos.cl no ha revisado todos los sitios vinculados a su sitio web y no
                es responsable de los contenidos de dicho sitio vinculado. La inclusión de cualquier enlace no
                implica la aprobación por arenaparagatos.cl del sitio. El uso de cualquier sitio
                web vinculado es bajo el propio riesgo del usuario.</p>

            <h2>7. Modificaciones</h2>
            <p>arenaparagatos.cl puede revisar estos términos de servicio para su sitio web en
                cualquier momento sin previo aviso. Al utilizar este sitio web, usted acepta estar vinculado por la
                versión actual de estos términos de servicio.</p>

            <h2>8. Ley Aplicable</h2>
            <p>Estos términos y condiciones se rigen e interpretan de acuerdo con las leyes globales y usted se
                somete irrevocablemente a la jurisdicción exclusiva de los tribunales en esa jurisdicción o
                ubicación.</p>

    </div>
    <!-- Aquí terminan los términos y condiciones -->


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