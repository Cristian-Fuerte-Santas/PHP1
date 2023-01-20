<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina_principal.php</title>

    <style>
        <?php  include 'CSS/pagina_principal.css'; ?>
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Archivo externo CSS-->

    <link rel="stylesheet" type="text/css" href="CSS/pagina_principal.css" />
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


    <!-- Boton login-->


    <div id="divlogin" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

                <form action="login.php" method="post">

                    <button id="botonlogin" type="submit" class="btn btn-primary">Login</button>

                </form>

            </div>

        </div>

    </div>


    <!-- Boton registrase-->

    <div id="divregistrarse" class="container">

        <div class="row">
            <div class="col-lg-12 col-md-6 col-sm-3">


                <form action="registrarse.php" method="post">

                    <button id="botonregistrarse" type="submit" class="btn btn-primary">Registrarse</button>

                </form>
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