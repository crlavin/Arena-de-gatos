<style>
    /* Estilos básicos para el botón y el menú */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown a {
        background-color: #A0C3D2;
        color: white;
        padding: 10px;
        cursor: pointer;
    }

    .dropdown a li {
        list-style: none;
    }

    .dropdown a li i {
        margin-right: 5px;
    }

    .dropdown-menu {
        color: #A0C3D2;
        display: none;
        position: absolute;
        min-width: 160px;
        z-index: 1;

    }

    .dropdown-menu a {
        color: white;
        padding: 8px;
        text-decoration: none;
        display: block;
        border: 1px solid white;
    }

    .dropdown-menu a:hover {
        background-color: #A0C3D2;
    }

    .show {
        display: flex;
    }
</style>

<nav class="fadeIn">
    <div class="img_brand">
        <a href="index.php"><img src="img/logo2.png" alt="" width="150PX"></a>
    </div>
    <div class="nav_options">
        <ul>
            <li><a href="index.php">INICIO</a></li>
            <li><a href="productos.php">PRODUCTOS</a></li>
            <li><a href="nosotros.php">NUESTRA EMPRESA</a></li>
            <li><a href="politica_priv.php">POLITICA DE PRIVACIDAD</a></li>
            <li><a href="terminos_condiciones.php">TERMINOS Y CONDICIONES</a></li>
            <li><a href="checkout.php"><i class="fas fa-shopping-cart"></i> CARRITO <span id="num_cart"><?php echo $num_cart; ?></span></a></li>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <div class="dropdown">
                    <a id="btn-session" onclick="toggleDropdown()">
                        <i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?>
                    </a>
                    <div class="dropdown-menu" id="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                        <a class="dropdown-item" href="compras.php">Mis compras</a>
                    </div>
                </div>
            <?php } else { ?>
                <li><a href="login.php"><i class="fas fa-user"></i> LOGIN</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>

<script>
    function toggleDropdown() {
        document.getElementById("dropdown-menu").classList.toggle("show");
    }

    // Cerrar el menú si el usuario hace clic fuera de él
    window.onclick = function(event) {
        if (!event.target.matches('#btn-session')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>