<?php
ob_start();
include("conexion.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista_admin.php</title>

    <style>
<?php include 'CSS/vista_admin.css'; ?>
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

    <!-- Bienvenida Y Log Out -->

    <div id="divbienvenidaYLogOut" class=" container-flex justify-content-between">


        <div class="col-lg-12 col-md-6 col-sm-3 d-flex justify-content-between">

            <div id="divbienvenida">

                <h3>BIENVENIDO: <?php echo $_SESSION['email'] . '<br><br>'; ?> </h3>

            </div>

            <div id="divLogOut">

                <a href="pagina_principal.php" class="btn btn-light">Log out</a>

            </div>


        </div>


    </div>

    <!-- Menú del Admin -->

    <div id="divmenuAdmin" class="container justify-content-between">

        <br>
        <h2>MENÚ DEL ADMINISTRADOR</h2>
        <br>

        <div class="col-lg-12 col-md-6 col-sm-3 d-flex justify-content-between">



            <form id="botones" method="post" class="col-lg-12 col-md-6 col-sm-3 d-flex justify-content-between">

                <input type="hidden" name="esconder" />

                <input type="submit" name="verRegistroYLogin" class="btn btn-success" value="Ver Usuarios" />

                <input type="submit" name="verTodasLasPeliculas" class="btn btn-success" value="Ver Películas" />

                <input type="submit" name="insertarPelicula" class="btn btn-success" value="Insertar Película" />

                <input type="submit" name="borrar" class="btn btn-success" value=" Borrar Película" />

            </form>

        </div>

        <br>

    </div>


    <!-- Div de destino -->
    <div id="divdestino" class="container col-lg-12 col-md-6 col-sm-3 h-100 justify-content-between">

        <div class="row justify-content-between ">

            <div class="container col-lg-12 col-md-6 col-sm-3 justify-content-between">




                <!-- Código PHP , para ver lista de usuarios-->

<?php
                include("conexion.php");



                //menu admin
                
                if (!isset($_POST['esconder'])) {

                    //no pongo nada porque este se selecciona automáticamente
                
                } else if (isset($_POST['verRegistroYLogin'])) {

                    verRegistroYLogin();

                } else if (isset($_POST['verTodasLasPeliculas'])) {

                    verTodasLasPeliculas();

                } else if (isset($_POST['borrar'])) {

                    header('Location: borrar_admin.php');



                } else if (isset($_POST['insertarPelicula'])) {


                    header('Location: insertar_admin.php');

                } else {
                    echo "error";
                }


                //funcion para ver la lista de usuarios y contraseñas
                function verRegistroYLogin()
                {

                    include("conexion.php");



                    $consulta1 = "select * from usuarios";
                    $paquete1 = mysqli_query($conexion, $consulta1);

                    echo '<table  border=2 >
                    <tr>
                        <td width=206px height=44px>TIPO</td>
                        <td width=206px height=44px>EMAIL</td>
                        <td width=206px height=44px>CONTRASEÑA</td>
                    </tr>
                    </table>';

                    while ($fila = mysqli_fetch_array($paquete1)) {

                        echo "<table border=2>

                        <tr>
                            <td width=206px> <input type='text' name='tipo' value='" . $fila['tipo'] . "'> </td>
                            <td width=206px> <input type='text' name='email' value='" . $fila['email'] . "'> </td>
                            <td width=206px> <input type='text' name='contrasenia' value='" . $fila['contrasenia'] . "'> </td>
                        </tr>

                        </table>";
                    }



                }
                ;


                function verTodasLasPeliculas()
                {



                    include("conexion.php");

                    $consulta2 = "select * from peliculas";
                    $paquete2 = mysqli_query($conexion, $consulta2);


                    echo '<table  border=2 >
                        <tr>
                        
                            <td width=206px height=44px>NÚMERO DE PELÍCULA</td>
                            <td width=206px height=44px>TÍTULO</td>
                            <td width=205px height=44px>GÉNERO</td>
                            <td width=206px height=44px>DURACIÓN</td>
                            <td width=206px height=44px>CANTIDAD DISPONIBLE</td> 

                        </tr>
                        </table>';


                    while ($fila = mysqli_fetch_array($paquete2)) {

                        echo "<table  border=2>

                                <tr>

                                    <td width=206px> <input type='text' name='idpeliculas' value='" . $fila['idpeliculas'] . "'> </td>

                                    <td width=206px> <input type='text' name='titulo' value='" . $fila['titulo'] . "'> </td>

                                    <td width=206px><input type='text' name='genero' value='" . $fila['genero'] . "'> </td>

                                    <td width=206px><input type='text' name='duracion' value='" . $fila['duracion'] . "'> </td>

                                    <td width=206px><input type='text' name='cantidadDisponible' value='" . $fila['cantidadDisponible'] . "'> </td>

                                </tr>

                            </table>";
                    }

                }
;
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