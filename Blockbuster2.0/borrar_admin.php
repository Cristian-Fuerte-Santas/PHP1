<?php
include("conexion.php");
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>borrar_admin.php</title>

    <style>
        <?php include 'CSS/borrar_admin.css'; ?>
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Archivo externo CSS-->

    <link rel="stylesheet" type="text/css" href="CSS/borrar_admin.css" />
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

    <!-- Div de destino-->

    <div id="divdestino">

        <!-- Código PHP, borrar película-->
        <?php

        include("conexion.php");
        session_start();


        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $duracion = $_POST["duracion"];
        $cantidad = $_POST["cantidadDisponible"];


        $borrar = $_POST["borrar"];
        $i = $_POST["idpeliculas"];

        $consulta = "select * from peliculas";

        $paquete = mysqli_query($conexion, $consulta);

        if (!isset($borrar)) {


            echo '<table border=2 >
                <tr>
                    <td width=206px height=44px>NÚMERO DE PELÍCULA</td>
                    <td width=206px height=44px>TÍTULO</td>
                    <td width=205px height=44px>GÉNERO</td>
                    <td width=206px height=44px>DURACIÓN</td>
                    <td width=206px height=44px>CANTIDAD DISPONIBLE</td> 
                    <td width=206px height=44px>ACCIÓN</td> 
                </tr>
                </table>';

            while ($fila = mysqli_fetch_array($paquete)) {


                echo '<table border=2  >
               
                    <form method="post" action="borrar_admin.php">

                        <tr>
                            <td width=206px> <input type="text" name="idpeliculas" value="' . $fila['idpeliculas'] . '"> </td>

                            <td width=206px> <input type="text" name="titulo" value="' . $fila['titulo'] . '"> </td>

                            <td width=206px><input type="text" name="genero" value="' . $fila['genero'] . '"></td>

                            <td width=206px><input type="text" name="duracion" value="' . $fila['duracion'] . '"></td>

                            <td width=206px><input type="text" name="cantidadDisponible" value="' . $fila['cantidadDisponible'] . '"></td>

                            <td width=206px><input type="submit" class="btn btn-danger" name="borrar" value="Borrar"></td>


                        </tr>

                    </form>
                </table>';


            }

        } else {


            if (isset($borrar)) {

                $consulta = "DELETE FROM peliculas WHERE idpeliculas='$i' ";
                $paquete = mysqli_query($conexion, $consulta);
                echo "Película borrada";

            }
        }



        


        ?>
    </div>

    <!-- Boton volver atrás-->

    <div id="divvolver" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

                <a class="btn btn-primary" href="vista_admin.php">Volver</a>

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