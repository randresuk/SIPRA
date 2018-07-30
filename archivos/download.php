<?php

$file = file("C:/xampp/htdocs/ServiBarras/archivos/".$_POST['archivo1']."");
$file2 = implode("", $file);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$_POST['archivo1']."");
echo $file2;
?>