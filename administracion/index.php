<?php
session_start();
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <title></title>
    </head>
    <body>

        <div id="container">
            <div id="header">
                <h3 class="text-center">Dashboard Excursiones</h3>

                <form action="../index.php" method="post">
                    <input class="volver" type="submit" value="Cerrar Sesión">
                </form>
            </div>


            <div id="content">

                <?php
                if (!isset($_SESSION['logueado'])) {

                    header("Location: login.php");
                }



                include "conexion.php";

                $accion = $_POST['accion'];

                if (!isset($_SESSION['pagina'])) {
                    $_SESSION['pagina'] = 1;
                }


                if ($accion == "Nueva excursion") {
                    move_uploaded_file($_FILES["imagen"]["name"] . "../img/" . $_FILES["imagen"]["name"]);
                    $inserta = "INSERT INTO excursiones (codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle) VALUES ('$_POST[codigo]', '$_POST[categoria]', '$_POST[nombre]', '$_POST[precio]' , '$_FILES[imagen][name]' , '$_POST[oferta]' , '$_POST[novedad]' , '$_POST[detalle]')";
                    $conexion->exec($inserta);
                }


                if ($accion == "Modificar") {
                    $modifica = "UPDATE excursiones SET  categoria='$_POST[categoria]', nombre='$_POST[nombre]', precio='$_POST[precio]' , imagen='$_POST[imagen]' , oferta='$_POST[oferta]' , novedad='$_POST[novedad]' , detalle='$_POST[detalle]'WHERE codigo='$_POST[codigo]'";
                    $conexion->exec($modifica);
                }


                if ($accion == "Eliminar") {
                    $elimina = "DELETE FROM excursiones WHERE codigo='$_POST[codigo]'";
                    $conexion->exec($elimina);
                }

                // MUESTRA PAGINA------------------------------------------------//

                $sentencia = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle FROM excursiones ";
                //echo $sentencia;
                $excursiones = $conexion->query($sentencia);

                $numExcursiones = $excursiones->rowCount();
                $numPaginas = floor(abs($numExcursiones - 1) / 4) + 1;

                $pagina = $_POST['pagina'];

                if ($pagina == "primera") {
                    $_SESSION['pagina'] = 1;
                }

                if (($pagina == "anterior") && ($_SESSION['pagina'] > 1)) {
                    $_SESSION['pagina'] --;
                }

                if (($pagina == "siguiente") && ($_SESSION['pagina'] < $numPaginas)) {
                    $_SESSION['pagina'] ++;
                }

                if ($pagina == "ultima") {
                    $_SESSION['pagina'] = $numPaginas;
                }


                // LISTADO TOTAL----------------------------------------------------
                $sentencia = "SELECT codigo, categoria, nombre, precio, imagen, oferta, novedad, detalle FROM excursiones ORDER BY codigo LIMIT " . (($_SESSION['pagina'] - 1) * 4) . ", 4";

                $excursiones = $conexion->query($sentencia);
                ?>

                <table  class="table table-striped">
                    <tr>
                        <th>CODIGO</th>
                        <th>CATEGORIA</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>IMAGEN</th>
                        <th>OFERTA</th>
                        <th>NOVEDAD</th>
                        <th>DETALLE</th>
                        <th colspan="2"><form action="nuevaExcursion.php" method="post">                            
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span> Añadir Excursión
                                </button>
                            </form></th>
                    </tr>

                    <?php
                    while ($articulo = $excursiones->fetchObject()) {
                        ?>
                        <tr>
                            <td><?= $articulo->codigo ?></td>
                            <td><?= $articulo->categoria ?></td>
                            <td><?= $articulo->nombre ?></td>
                            <td><?= $articulo->precio ?></td>
                            <td><?= $articulo->imagen ?></td>
                            <td><?= $articulo->oferta ?></td>
                            <td><?= $articulo->novedad ?></td>
                            <td><?= $articulo->detalle ?></td>
                            <td>
                                <form action="eliminar.php" method="post">
                                    <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">
                                    <input type="hidden" name="categoria" value="<?= $articulo->categoria ?>">
                                    <input type="hidden" name="nombre" value="<?= $articulo->nombre ?>">
                                    <input type="hidden" name="precio" value="<?= $articulo->precio ?>">
                                    <input type="hidden" name="imagen" value="<?= $articulo->imagen ?>">
                                    <input type="hidden" name="oferta" value="<?= $articulo->oferta ?>">
                                    <input type="hidden" name="novedad" value="<?= $articulo->novedad ?>">
                                    <input type="hidden" name="detalle" value="<?= $articulo->detalle ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span> Eliminar
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="modificar.php" method="post">
                                    <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">  
                                    <input type="hidden" name="categoria" value="<?= $articulo->categoria ?>">
                                    <input type="hidden" name="nombre" value="<?= $articulo->nombre ?>">
                                    <input type="hidden" name="precio" value="<?= $articulo->precio ?>">
                                    <input type="hidden" name="imagen" value="<?= $articulo->imagen ?>">
                                    <input type="hidden" name="oferta" value="<?= $articulo->oferta ?>">
                                    <input type="hidden" name="novedad" value="<?= $articulo->novedad ?>">
                                    <input type="hidden" name="detalle" value="<?= $articulo->detalle ?>">
                                    <button type="submit" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-pencil"></span>Modificar
                                    </button>
                                </form>
                            </td>  
                        </tr>
                        <?php
                    }
                    ?>

                    <!-- NUEVA EXCURSION------------------------------------------>

                    <tr>

                    </tr>
                    <!-- PAGINACION ---------------------------------->

                    <tr>

                        <!-- PRIMERA----------------------------------------->
                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="primera">
                                    <span class="glyphicon glyphicon-step-backward"></span>
                                    Primera
                                </button>
                            </form>
                        </td>

                        <!-- ANTERIOR--------------------------------->
                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="anterior">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    Anterior
                                </button>
                            </form>
                        </td>

                        <td>Página <?= $_SESSION['pagina'] ?> de <?= $numPaginas ?></td>


                        <!-- SIGUIENTE--------------------------------------------->
                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="siguiente">
                                    Siguiente
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </button>
                            </form>
                        </td>

                        <!-- ULTIMA---------------------------------------------->
                        <td>
                            <form action="#" method="post">
                                <button type="submit" name="pagina" value="ultima">
                                    Última
                                    <span class="glyphicon glyphicon-step-forward"></span>
                                </button>
                            </form>
                        </td>  
                        <td></td><td></td><td></td><td></td><td></td>
                    </tr>
                </table>
                <br><br><br>
                Número de excursiones: <?= $numExcursiones ?>


            </div>

            <div id="footer" class="text-center">
                © Belén Gutierrez
            </div>
        </div>
        <script src="../js/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
