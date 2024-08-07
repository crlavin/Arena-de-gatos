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
    
    <!--Aqui comienza la Política de privacidad-->
    <h1 class="tpolpriv flash">Política de privacidad</h1>
    <div class="seccion_polpriv fadeInUp">
        <h1>Política de Privacidad de Arena para Gatos</h1>
        <p>La presente Política de Privacidad establece los términos en que Arena para Gatos usa y protege la
            información proporcionada por sus usuarios al utilizar su sitio web. Esta compañía está comprometida con la
            seguridad de los datos de sus usuarios. Al solicitarnos completar campos de información personal con los
            cuales usted pueda ser identificado, aseguramos que dicha información solo se utilizará de acuerdo con los
            términos de este documento. Sin embargo, esta Política de Privacidad puede cambiar con el tiempo o ser
            actualizada, por lo que recomendamos revisar continuamente esta página para asegurarse de que está de
            acuerdo con dichos cambios.</p>

        <h2>Información que Recogemos</h2>
        <p>Nuestro sitio web puede recopilar la siguiente información personal:</p>
        <ul>
            <li>Nombre</li>
            <li>Información de contacto como dirección de correo electrónico</li>
            <li>Información demográfica</li>
            <li>Información específica para procesar pedidos, entregas o facturación</li>
        </ul>

        <h2>Uso de la Información Recogida</h2>
        <p>Arena para Gatos utiliza la información recopilada para proporcionar el mejor servicio posible, incluyendo:
        </p>
        <ul>
            <li>Mantener un registro de usuarios</li>
            <li>Gestionar pedidos y entregas</li>
            <li>Mejorar nuestros productos y servicios</li>
        </ul>
        <p>Es posible que enviemos correos electrónicos periódicos con ofertas especiales, nuevos productos y otra
            información publicitaria relevante para usted. Estos correos electrónicos se enviarán a la dirección
            proporcionada por usted y pueden ser cancelados en cualquier momento.</p>
        <p>Arena para Gatos está altamente comprometido con la seguridad de su información. Utilizamos sistemas
            avanzados que actualizamos constantemente para prevenir accesos no autorizados.</p>

        <h2>Cookies</h2>
        <p>Una cookie es un fichero que se almacena en su ordenador al aceptar su uso, permitiendo a la web obtener
            información sobre el tráfico y facilitar futuras visitas. Las cookies permiten que las web lo reconozcan
            individualmente, proporcionando un servicio personalizado.</p>
        <p>Nuestro sitio web utiliza cookies para identificar las páginas visitadas y su frecuencia. Esta información se
            usa únicamente para análisis estadístico y luego se elimina permanentemente. Usted puede eliminar las
            cookies en cualquier momento desde su ordenador. Las cookies no otorgan acceso a información de su ordenador
            ni de usted, a menos que usted lo proporcione directamente. Usted puede aceptar o declinar el uso de
            cookies. Sin embargo, al declinar cookies, algunos servicios de nuestro sitio web podrían no estar
            disponibles.</p>

        <h2>Enlaces a Terceros</h2>
        <p>Nuestro sitio web puede contener enlaces a otros sitios de interés. Una vez que haga clic en estos enlaces y
            abandone nuestra página, no tenemos control sobre el sitio redirigido y no somos responsables de los
            términos o políticas de privacidad ni de la protección de sus datos en esos sitios terceros. Recomendamos
            consultar las políticas de privacidad de esos sitios para asegurarse de estar de acuerdo con ellas.</p>

        <h2>Control de su Información Personal</h2>
        <p>Usted puede restringir la recopilación o el uso de su información personal en cualquier momento. Cada vez que
            se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de
            recibir información por correo electrónico. Si ha aceptado recibir nuestro boletín o publicidad, puede
            cancelarlo en cualquier momento.</p>
        <p>Arena para Gatos no venderá, cederá ni distribuirá la información personal recopilada sin su consentimiento,
            salvo que sea requerido por un juez con una orden judicial.</p>

        <h2>Cambios en la Política de Privacidad</h2>
        <p>Arena para Gatos se reserva el derecho de cambiar los términos de la presente Política de Privacidad en
            cualquier momento. Le recomendamos revisar esta página periódicamente para asegurarse de estar informado de
            cualquier cambio.</p>

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