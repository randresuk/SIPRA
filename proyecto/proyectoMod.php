<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/regla.css" />
<script src="../js/jquery.js"></script>
<script src="../js/events.js"></script>

<title>Servibarras</title>
</head>
<body>
  <form id="proyMod" name="proyMod" method="post" action="../Clases/Proyecto.php" target="visual" class="escalar" >
        <div id="caso4" >
              	<p> <input id="func3" type="hidden" name="func" size="3" value="20" /></p>
                <p> <input id="listEmp" type="hidden" name="list" size="1" value="2" /></p>
        </div>
  </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
		$("#proyMod").submit();			
	$(".Fecha").blur(function(){
            var idL = this.id;
            accept = validar_fecha($("#"+idL).val());
            if(!accept) $("#"+idL).val('');
        });
});		

</script>
</html>

               