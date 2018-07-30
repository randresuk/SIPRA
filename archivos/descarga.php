<form action="download.php" method="post" enctype="multipart/form-data">
  <p>
    Archivos:
   <?php
    	$dir = opendir("C:/xampp/htdocs/ServiBarras/SB/archivos/Files/");  
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

