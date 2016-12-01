<?php
session_start();
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/estilo.css" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
        <div id='cuerpo'></div>
        <div id="container">
            <div id="header">
                <h1>Isla Mujeres</h1>

                <h2>Travel Agency</h2>

            </div>

            <div class="news">

                <form action="administracion/login.php" method="post">
                    <input type="hidden" name="accion" value="adm">                          
                    <input id="adm" class="detalle"  type="submit" value="ADMINISTRACION">
                </form>
            </div><br>

            <div id="content">

                <div id="excursion">
                    <h3>Excursiones</h3><hr>



                    <?php
                    include "conexion.php";

                    $sentencia = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle FROM excursiones ";
                    //echo $sentencia;
                    $consulta = $conexion->query($sentencia);

                    while ($articulo = $consulta->fetchObject()) {

                        $_SESSION['excursiones'][$articulo->codigo] = array("categoria" => $articulo->categoria,
                            "nombre" => $articulo->nombre, "precio" => $articulo->precio,
                            "imagen" => $articulo->imagen, "oferta" => $articulo->oferta,
                            "novedad" => $articulo->novedad, "detalle" => $articulo->detalle);
                    }
                    //print_r($_SESSION['excursiones']);
                    // ---------------Tienda ---------------------------------------------------
                    foreach ($_SESSION['excursiones'] as $articulo) {
                        //while ($articulo = $_SESSION['excursiones']->fetchObject()) {
                        ?>
                        <div class="muestra">
                            <img src="img/<?= $articulo['imagen'] ?>"><br>

                            <?= $articulo['nombre'] ?><br>Precio: <?= $articulo['precio'] ?> mxn
                            <br>Detalle:<br> <?= $articulo['detalle'] ?>

                        </div>

                        <?php
                    }
                    ?>

                </div>

            </div>

            <div id="footer">
                © Belén Gutierrez
            </div>
        </div>
    </body>
</html>

