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
                    <h1>B&M</h1>
                </div>
            </div>
            <div class="header__busqueda-nav">
                
            </div>
            <div class="header__busqueda-ingresar">
                <a href="#" class="header__ingresar-icon"><i class="fa-solid fa-user fa-2xl" style="color: #000000;"></i></a>
            </div>
        </nav>
        <div class="header__categoria">
            <a href="categoria.php" class="header__crui" >CREAR CATEGORIAS</a>
            <a href="prods.php" class="header__crui" >REGISTRAR PRODUCTOS</a>
            <a href="mostrar.php" class="header__crui" >MOSTRAR PRODUCTOS</a>
        </div>
    </header>

    <div class="contenedor__producto">
        <h2>Tabla de productos</h2>
        <!-- Codigo de la tabla en php -->
        <?php include 'php/table.php'; ?>

    </div>
    <footer>
        footer
    </footer>
    <script src="javascript/delete.js"></script>
    <script src="https://kit.fontawesome.com/a9350bb608.js" crossorigin="anonymous"></script>
</body>
</html>