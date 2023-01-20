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
    <title>insertar_admin.php</title>

    <style>
        <?php include 'CSS/insertar_admin.css'; ?>
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



        <?php
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
        

        include("conexion.php");


        if (!isset($_POST["submit"])) {


            echo '<table border=2  width="600px" >

                 <form method="post" action="insertar_admin.php" >

                    <tr>

                     <td> <br> TÍTULO:  <input class="w-100" type="text" name="insertarTítulo" >  </td> 
                      
                    </tr>
                    
                    <tr>

                        <td> <br> GÉNERO: <input class="w-100" type="text" name="insertarGenero">  </td> 

                    </tr>

                    <tr>

                        <td> <br> DURACIÓN: <input class="w-100"  type="number" name="insertarDuracion" placeholder="en minutos"> </td> 

                    </tr>

                    <tr>

                        <td> <br> CANTIDAD: <input class="w-100" type="number" name="insertarCantidad" > </td> 

                    </tr>

                    <tr>

                      <td>  <br> <input  type="submit" name="submit" value="Añadir Película" class="btn btn-light">  </td> 

                    </tr>
                    
                     
                </table>
                
                </form>';

        } else {

            $titulo = $_POST['insertarTítulo'];

            $genero = $_POST['insertarGenero'];

            $duracion = $_POST['insertarDuracion'];

            $cantidad = $_POST['insertarCantidad'];



            $consulta = "insert into `peliculas` (`titulo`, `genero`, `duracion`, `cantidadDisponible`) VALUES ('$titulo', '$genero', '$duracion', '$cantidad');";

            $paquete = mysqli_query($conexion, $consulta);

            echo '<html><body>Película agregada! </body></html>';


          


        }
        ;




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

        <div id="footer" class="footer ">

            <div class="row">

                <div class="col-lg-12 col-md-6 col-sm-3">

                    © 2023 Copyright: Cristian Fuerte Santas

                </div>

            </div>

        </div>

    </footer>
</body>

</html>