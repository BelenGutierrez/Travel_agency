<?php
session_start();
?>
<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/estilo.css" rel="stylesheet" type="text/css" />
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <div class="bodyAdm">
            <div id="header">
                <h1>ADMINISTRACIÓN</h1>
                <h2>Acceso con login</h2>
            </div>

            <div id="content">
                <br><br>
                <?php
                include "conexion.php";

                $sentencia = "SELECT nombre, password FROM usuario";
                $datosUsuarios = $conexion->query($sentencia);



                //---------------- inicializo logueado-------------------------//

                if (!isset($_SESSION['logueado'])) {
                    $_SESSION['logueado'] = false;
                }

                //---------------- verifico el login-------------------------//
                $count = 0;
                while ($pass = $datosUsuarios->fetchObject()) {
                    if ($pass->nombre == $_POST['nom'] && $pass->password == $_POST['pass']) {
                        $count++;
                    }
                }


                if (isset($_POST['nom'])) {
                    if ($count == 1) {
                        $_SESSION['logueado'] = true;
                        header("Location: index.php");
                    } else {
                        echo '<span style="color: red">Contraseña incorrecta. Inténtelo de nuevo.</span><br><br>';
                    }
                }

                //if ($_SESSION['logueado']) {
                //    header("Location: index.php");
                //}
                ?>


                <h3>Por favor introduzca los datos para acceder</h3>
                <form action="#" method="post">
                    Usuario:
                    <input type="text" name ="nom" required autofocus>
                    Contraseña:
                    <input type="text" name ="pass" required>

                    <input type="submit" value="OK">
                </form>

                <br><br><br><br><br><br><br><br><br><br><br><br>

            </div>

            <div id="footer">
                © Belén Gutierrez
            </div>
        </div>
    </body>
</html>
