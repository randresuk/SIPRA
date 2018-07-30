<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/regla.css" />
<title>Servibarras</title>
</head>

<body>

    <div id="contenedor" class="archivo">
        <form action="download.php"   method="post" enctype="multipart/form-data">
          <p>
              Archivos:<br>
           <?php
                $dir = opendir("C:/xampp/htdocs/ServiBarras/SB/archivos");  
                while($archivo=readdir($dir)){
                                if($archivo=='.' || $archivo=='..');
                                else{
                ?>
             <input type="checkbox" name="archivo1" value="<?php echo $archivo;?>">
             <label>
                 <?php echo $archivo."<br>";?>
             </label>
            <?php
                                }
                }
            ?>
          </p>
          <p>
            <input type="submit" name="Descargar" id="Descargar" value="Descargar" />
          </p>
        </form>
    </div>  
</body>
<script src="../js/jquery.js"></script>
<script language="javascript">
	$(document).ready(function() {
         //  $("#up").hide(); 
			
});		
</script>
</html>