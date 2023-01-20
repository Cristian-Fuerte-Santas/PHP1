<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>

    <style>
        <?php include 'CSS/login_registrarse.css'; ?>
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Archivo externo CSS-->

    <link rel="stylesheet" type="text/css" href="CSS/login_registrarse.css" />
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Cabecera -->

    <div id="cabecera" class="container-flex">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

                <h1>BLOCKBUSTER</h1>

            </div>

        </div>

    </div>



    <!-- Formulario de Login -->

    <div id="formulariologin" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

                <form method="post" action="login.php">



                    <h2>USUARIO </h2>
                    <input class="casilla" type="text" name="email" placeholder="El usuario es su email">

                    <br><br>

                    <h2>CONTRASEÑA </h2>
                    <input class="casilla" type="password" name="contrasenia">

                    <br><br>

                    <input id="botonlogin" type="submit" name="submit" value="Login" class="btn btn-primary">

                </form>
            </div>

        </div>

    </div>


    <div id="divdestino" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

              <!-- Código PHP para hacer login -->
<?php

                include("conexion.php");
                session_start();
                if (isset($_POST["submit"])) {

                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['contrasenia'] = $_POST['contrasenia'];
    $_SESSION['idusuarios'] = $_POST['idusuarios'];
                    

                    $consulta = "select * from usuarios";
                    $paquete = mysqli_query($conexion, $consulta);
                    $encontrado = 0;

                    while ($fila = mysqli_fetch_array($paquete)) {

                        
                        if (($_SESSION['email'] == $fila['email']) and ($_SESSION['contrasenia'] == $fila['contrasenia'])) {
                            $encontrado = 1;
                        }
    
                    }

                    if ($encontrado == 1) {

                        header('Location: vista_usuario.php');

                    } else {

                        echo "Usuario o contraseña incorrectos";

                    }
                    if ($_SESSION['email'] == 'admin' && $_SESSION['contrasenia'] == 'admin') {

                        header('Location: vista_admin.php');
                    }
                }

?>


            </div>

        </div>

    </div>

<!-- Boton volver atrás-->

    <div id="divvolver" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

            <a class="btn btn-primary" href="pagina_principal.php">Volver</a>
           
            </div>

        </div>

    </div>




    <!-- Footer -->
    <footer class="footer mt-auto">
        <div id="footer" class="footer">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-3">

                    © 2023 Copyright: Cristian Fuerte Santas
                </div>

            </div>
        </div>

    </footer>

</body>

</html>