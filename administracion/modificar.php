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
                <h3 class="text-center">Modificación de excursion</h3>
                <form action="../index.php" method="post">
                    <input class="volver" type="submit" value="Cerrar Sesión">
                </form>
            </div>
            <div id="content">

                <?php
                if (!isset($_SESSION['logueado'])) {

                    header("Location: login.php");
                }


                // include "conexion.php";

                $codigo = $_POST['codigo'];
                $categoria = $_POST['categoria'];
                $nombre = $_POST['nombre'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $oferta = $_POST['oferta'];
                $novedad = $_POST['novedad'];
                $detalle = $_POST['detalle'];
                ?>
                <table  class="table table-striped">
                    <form action = "index.php" method = "post">
                        <tr>
                            <th class="text-center" colspan="4"><h3 class="text-center">Desea modificar los datos de la excursión?</h3></th>
                        </tr>
                        <tr>
                            <td>CODIGO: <input type = "text" name = "codigo" size="5" value = "<?= $codigo ?>" readonly = "readonly"></td>
                            <td>CATEGORIA: <input type = "text" name = "categoria" size="8" value = "<?= $categoria ?>"></td>
                            <td>NOMBRE: <input type = "text" name = "nombre" size="8" value = "<?= $nombre ?>" ></td>
                            <td>PRECIO: <input type = "number" name = "precio" size="8" value = "<?= $precio ?>"></td>
                        </tr>
                        <tr>
                            <td>IMAGEN: <input type = "text" name = "imagen" size="10" value = "<?= $imagen ?>"></td>
                            <td>OFERTA: <input type = "text" name = "oferta" size="4" value = "<?= $oferta ?>"></td>
                            <td>NOVEDAD: <input type = "text" name = "novedad" size="4" value = "<?= $novedad ?>"></td>
                            <td>DETALLE: <input type = "text" name = "detalle" size="35" value = "<?= $detalle ?>"></td>
                        </tr>
                        <tr>

                            <td><button type="submit" class="btn btn-success" name="accion" value="Modificar">
                                    <span class="glyphicon glyphicon-ok"></span> Modificar
                                </button></td>
                            <td>
                                <a class="btn btn-danger" href="index.php" role="button">
                                    <span class="glyphicon glyphicon-remove"></span>Cancelar
                                </a></td><td></td><td></td>
                        </tr>   
                    </form>
                </table>

            </div>
            <br><br><br><br><br><br><br><br><br><br>
            <div id="footer" class="text-center">
                © Belén Gutierrez
            </div>
        </div>
        <script src="../js/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
