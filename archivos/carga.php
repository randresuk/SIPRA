<?php
$archivo = $_FILES['upload']['name'];
$destino = "C://xampp//htdocs//ServiBarras//archivos".$archivo;
copy($_FILES['upload']['tmp_name'], $destino);
?>