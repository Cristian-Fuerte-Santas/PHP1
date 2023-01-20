<?php
ob_start();
include("conexion.php");
session_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alquilar_usuario.php</title>

    <style>
        <?php include 'CSS/vista_usuario.css'; ?>
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Archivo externo CSS-->

    <link rel="stylesheet" type="text/css" href="CSS/vista_usuario.css" />
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

                <h3>BIENVENIDO: <?php echo $_SESSION['email'] . $_SESSION['idusuarios'] . '<br><br>'; ?> </h3>

            </div>

            <div id="divLogOut">

                <a href="pagina_principal.php" class="btn btn-light">Log out</a>

            </div>


        </div>


    </div>

    <!-- Menú del Usuario -->

    <div id="divmenuUsuario" class="container justify-content-between">

        <br>
        <h2>MENÚ DEL USUARIO</h2>
        <br>

        <div class="col-lg-12 col-md-6 col-sm-3 d-flex justify-content-between">



            <form id="botones" method="post" class="col-lg-12 col-md-6 col-sm-3 d-flex justify-content-between">

                <input type="hidden" name="esconder" />

                <input type="submit" name="alquilarPelicula" class="btn btn-success" value="Alquilar Película" />

                <input type="submit" name="devolverPelicula" class="btn btn-success" value="Devolver Película" />

                <input type="submit" name="listadoAlquiladas" class="btn btn-success" value="Listado Alquiladas" />



            </form>

        </div>

        <br>

    </div>

    <!-- funcion para mostrar pelicula -->



<?php

    //menu usuario

    if (!isset($_POST['esconder'])) {

        //no pongo nada porque este se selecciona automáticamente

    } else if (isset($_POST['alquilarPelicula'])) {

        header('Location: alquilar_usuario.php');

    } else if (isset($_POST['devolverPelicula'])) {

        header('Location: devolver_usuario.php');

    } else if (isset($_POST['listadoAlquiladas'])) {

        header('Location: veralquiladas_usuario.php');

    } else {
        echo "error";
    }

    function mostrarPelis()
    {


        include("conexion.php");

        $consulta2 = "SELECT * FROM `peliculas` ;";

        $paquete2 = mysqli_query($conexion, $consulta2);

        $idpeliculas = $_POST['idpeliculas'];

        echo "<div id='divResultado'  class='grid-container'>";

        while ($fila = mysqli_fetch_array($paquete2)) {

        $cantidad = $fila['cantidadDisponible'];

       
        //si la cantidad dispomible es menor de 1, no se muestra la pelicula
            if ($cantidad > 1){

            
        
                 echo " <div class='grid-item'>

       
                 <table  border=2>

                    <form method='post' action ='alquilar_usuario.php'>
                                <tr> 
                                    <td >NÚMERO</td>

                                    <td > <input type='text' name='idpeliculas' value='" . $fila['idpeliculas'] . "'> </td>

                                </tr>

                                <tr> 
                                    <td >TÍTULO</td>

                                    <td > <input type='text' name='titulo' value='" . $fila['titulo'] . "'> </td>

                                </tr> 

                                <tr> 
                                    <td >GÉNERO</td>

                                    <td ><input type='text' name='genero' value='" . $fila['genero'] . "'> </td>

                                </tr> 

                                <tr> 
                                    <td >DURACIÓN</td>

                                    <td ><input type='text' name='duracion' value='" . $fila['duracion'] . "'> </td>

                                </tr> 

                                <tr> 

                                    <td >CANTIDAD</td>

                                    <td ><input type='text' name='cantidadDisponible' value='" . $fila['cantidadDisponible'] . "'> </td>

                                </tr>

                                 <tr  > 

                                    <td ><input id='botonAlquilar' type='submit' name='$idpeliculas' value='Alquilar' class='btn btn-success'> </td>

                                </tr>

                </table>
                    </form>


            </div>";
        }  

    }
        //final del grid container
        echo "</div>";


    //cuando se hace click en "Alquilar"
        if (isset($_POST["idpeliculas"])) {


            //consigo el id del usuario que ha entrado
    
            $emailUsuario = $_SESSION['email'];

            $consulta2 = " SELECT idusuarios FROM `usuarios` WHERE email = '$emailUsuario';";

            $paquete2 = mysqli_query($conexion, $consulta2);

            while ($fila = mysqli_fetch_array($paquete2)) {

                $idUsuario = $fila['idusuarios'];

            }

            
            //resto 1 a la cantidad disponible de películas


            //Paso 1: consigo la cantidad disponible y la meto en una  variable
    

            $consulta2 = " SELECT cantidadDisponible FROM peliculas where idpeliculas = '$idpeliculas'";

            $paquete2 = mysqli_query($conexion, $consulta2);

            while ($fila = mysqli_fetch_array($paquete2)) {

                $cantidadDisponible = $fila['cantidadDisponible'];

            }

            
            $cantidadDisponible= $cantidadDisponible - 1;

            //Paso 2: actualizo la cantidad disponible en la pelicula seleccionada


        $consulta2 = " UPDATE`peliculas`SET`cantidadDisponible`='$cantidadDisponible'WHERE`peliculas`.`idpeliculas`='$idpeliculas';";

        $paquete2 = mysqli_query($conexion, $consulta2);



        //introduzco en la tabla pivote lo que acaba de pasar


        $consulta2 = "INSERT INTO `peliculasclientes` (`idpeliculasclientes`, `fidpeliculas`, `fidusuarios`, `devuelta`) VALUES (NULL, '$idpeliculas', '$idUsuario', '0'); ";

        $paquete2 = mysqli_query($conexion, $consulta2);


        //muestro mensaje de confirmación

        echo "<div id='divmensaje'>

        PELÍCULA ALQUILADA CORRECTAMENTE!
            
        </div>";
      

        }

    }
    ;

mostrarPelis();


?>




    <!-- Boton volver atrás-->

    <div id="divvolver" class="container">

        <div class="row">

            <div class="col-lg-12 col-md-6 col-sm-3">

                <a class="btn btn-primary" href="vista_usuario.php">Volver</a>

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