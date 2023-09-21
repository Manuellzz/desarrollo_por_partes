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
                    <div class="container w-75 my-5 shadow">
                        <div class="row align-items-stretch">
                            <!--IMAGEN-->
                            <div class="col bg d-none d-md-block col-md-5 col-lg-6 rounded-start"></div>
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
                                <h2 class="fw-bold text-center pt-4 mb-4">Bienvenido</h2>
                
                                <!-- FORMULARIO DE INICIAR SESION -->
                                <form action="../crui/php/validar_usuario.php" method="post">
                                    <!-- Pidiendo el correo electronico -->
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <!-- Pidiendo la contraseña -->
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <!-- Check box de recordarme -->
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" name="connected" class="form-check-input" id="">
                                        <label for="connected" class="form-check-label">Recordarme</label>
                                    </div>
                                    <!-- Div de error -->
                                    <div class="mb-1">
                                        <p class="text-danger">Correo o contraseña incorrecto</p>
                                    </div>
                                    <!-- Boton de iniciar sesión -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn button" name="iniciar_sesion">Iniciar sesion</button>
                                    </div>
                
                                    <!-- REGISTRO-OLVIDAR -->
                                    <div class="my-3">
                                        <span>No tienes cuenta?
                                            <a href="register.php">Regístrate</a>
                                        </span>
                                        <a href="password.php">Recuperar contraseña</a>
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
