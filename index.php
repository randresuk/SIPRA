<?php
    session_start(); //Función para gestionar la sesion de los usuarios.
    if(isset($_SESSION['user'])){
                if($_SESSION['status']==="admin")
                    header("Location: admin.php");
                else if($_SESSION['status']=="user")
                    header("Location: funcionario.php");
            }else {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/regla.css" />
        <title>SIPRA</title>
    </head>
    <body> 
        <div class="Sheet"> 
            <div id="BarraHeader">
                <strong>SERVIBARRAS, Todo tiene solución</strong>
            </div>
            <div class="Sheet-header">
                <div id="logo">
                    <div align="center">
                      <a href="http://www.servibarras.com/web/">
                      <img src="images/LOGO.png" alt="logo" width="250" height="300" align="left">
                      </a>
                    </div><!--center-->
                </div><!--logo-->
            </div><!--Sheet-header>-->
            <div class="formulario">
                <form  id="log" action="Clases/Clase_controlador.php" method="post">
                    <table>
                        <tbody>
                            <tr><td><p>Usuario: </p></td><td><input type="text" name="user" /></td></tr>
                            <tr><td > <p> Contraseña: </p></td><td><input id="user-password" type="password" name="pass" /></td></tr>
                            <p> <input type="hidden" name="func" size="2" value="1" />
                                <tr><td> <input type="submit" /></td></tr>
                        </tbody>
                    </table>  
                </form>  
            </div><!--formulario-->
         </div><!--Sheet-->
        <?php
            }
        ?>
        
    </body>
</html>