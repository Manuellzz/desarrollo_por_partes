<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/normalize.css">
    <title>B&M</title>
</head>
<body>
    <header>
        <nav class="header__busqueda">
            <div class="header__busqueda-logo">
                <div class="header__logo-img">

                </div>
                <div class="header__logo-h1">
                    <a href="../index.html"><h1>B&M</h1></a>
                </div>
            </div>
            <div class="header__busqueda-nav">
                
            </div>
            <div class="header__busqueda-ingresar">
                <a href="#" class="header__ingresar-icon"><i class="fa-brands fa-whatsapp fa-2xl"
                        style="color: #000000;"></i></a>
                <a href="#" class="header__ingresar-icon"><i class="fa-solid fa-cart-shopping fa-2xl"
                        style="color: #000000;"></i></a>
                <a href="#login-section" class="header__ingresar-icon"><i class="fa-solid fa-user fa-2xl"></i></a>

            </div>
        </nav>
        <div class="header__categoria">
            <a href="categoria.php" class="header__crui" >CREAR CATEGORIAS</a>
            <a href="prods.php" class="header__crui" >REGISTRAR PRODUCTOS</a>
            <a href="mostrar.php" class="header__crui" >MOSTRAR PRODUCTOS</a>
        </div>
    </header>

    <div class="contenedor__producto">

        <form id="crui_form" action="create_post.php" method="post">
            <!-- Codigo del select en php -->
            <?php include 'crui/php/create_get.php'; ?>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" required>
            <input type="number" name="precio_venta" id="precio_venta" placeholder="Precio del producto" required>
            <input type="number" name="stock" id="stock" placeholder="Cantidad del producto" required>
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del producto" required>
            <input type="text" name="imagen" id="imagen" placeholder="Imagen del producto" required>
            <button type="submit">REGISTRAR</button>

        </form>

    </div>

    <footer>
        footer
    </footer>
    <script src="javascript/prods.js"></script>
    <script src="https://kit.fontawesome.com/a9350bb608.js" crossorigin="anonymous"></script>
</body>
</html>