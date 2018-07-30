<?php
    session_start(); //Función para gestionar la sesion de los usuarios.
    session_destroy();//cerrrar sesión
    header("location : index.php");
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <script src="js/jquery.js"></script>
    <script src="js/events.js"></script>
    <title>Cerrar Sesión</title>
</head>
<body>
    <p>Has Cerrado Sesion</p>
    <br /><a href="index.php">Ir a pagina de inicio</a>
</body>
<script language="javascript">
$(document).ready(function() {
	//window.location("index.php");	
});		

</script>
</html>
