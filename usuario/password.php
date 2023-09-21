<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-degradado">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container w-75 my-4 rounded shadow">
                        <div class="row align-items-stretch">
                            <!--IMAGEN-->
                            <div class="col bg d-none d-md-block col-md-5 col-lg-6 rounded"></div>
                            <div class="col bg-cuarto p-5 rounded-end">
                                <!-- LOGO Y BIENVENIDA -->
                                <div class="row text-end">
                                    <!-- Nombre de la papeleria -->
                                    <div class="col-8">
                                        <h2 class="fw-bold text-start my-2">ByM</h2>
                                    </div>
                                    <!-- Logo -->
                                    <div class="col-4">
                                        <img class="" src="../img/logo.png" width="48" alt="logo">
                                    </div>
                                </div>
                                    <!-- Texto principal de donde estamos ubicados -->
                                <h2 class="fw-bold text-center pt-4 mb-4">Recupera tu contraseña</h2>

                                <!-- FORMULARIO DE RECUPERAR CONTRASEÑA -->
                                <form action="#" method="post">
                                    <!-- Pidiendo el correo electronico -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                    <!-- Pidiendo el documentoo -->
                                    <div class="mb-4">
                                        <label for="num_documento" class="form-label">Documento</label>
                                        <input type="text" class="form-control" name="num_documento" id="num_documento">
                                    </div>
                                    <!-- Boton de recuperar contraseña -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn button">Recuperar contraseña</button>
                                    </div>

                                    <!-- REGISTRO-OLVIDAR -->
                                    <div class="my-3">
                                        <span>Recuperaste tu cuenta?
                                            <a href="login.php">Inicia sesión</a>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-cuarto mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ByM 2023</div>
                            <div>
                                <a href="#">Politicas de privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
