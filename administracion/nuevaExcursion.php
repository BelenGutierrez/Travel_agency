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
    <body style="background-color:#e6ffe6;">
        <?php
        if (!isset($_SESSION['logueado'])) {

            header("Location: login.php");
        }
        ?>
        <div id="container">
            <div id="header">
                <h3 class="text-center">Ingrese la nueva excursión</h3>
                <form action="../index.php" method="post">
                    <input class="volver" type="submit" value="Cerrar Sesión">
                </form>
            </div>
            <div id="content">


                <form action="insertar.php" enctype="multipart/form-data" method="post">
                    <table class="table table-striped">
                        <tr>
                            <td>Código<input type="text" name="codigo" size="5"></td>

                            <td>Categoría<input type="text" name="categoria" size="8"></td>

                            <td>Nombre<input type="text" name="nombre"  size="10"></td></tr>
                        <tr>
                            <td>Precio<input type="number" name="precio" ></td>

                            <td>Oferta<input type="text" name="oferta"  size="4"></td>

                            <td>Novedad<input type="text" name="novedad"  size="4"></td></tr>
                        <tr>
                            <td>Detalle<input type="text" name="detalle"  size="15"> </td>

                            <td colspan="2">Imagen<input type="file" id="imagen" name="imagen"  size="10"></td></tr>
                        <tr>
                            <td colspan="4">
                                <button type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-ok"></span> Continuar
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>

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
