<?php
    session_start(); //Función para gestionar la sesion de los usuarios.
?>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Administrador</title>
    </head>
    <body>
        <?php
            if(isset($_POST['user'])){
                $_SESSION['nombre'] = $_POST['nombre'];
                echo "Bienvenido! Has iniciado sesion: ".$_POST['nombre'];
            }else{
                if(isset($_SESSION['user'])){
                echo "Has iniciado: ".$_SESSION['user'];
            }else{
                echo "Acceso Restringido";
            }
            }
        ?>
        <br /><a href="index.php">Ir a pagina 1</a>
        

    </body>
</html>
