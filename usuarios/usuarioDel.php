<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://localhost:8080/ServiBarras/SB/css/regla.css" />
<script src="http://localhost:8080/ServiBarras/SB/js/jquery.js"></script>
<script src="http://localhost:8080/ServiBarras/SB/js/events.js"></script>

<title>Servibarras</title>
</head>
<body>
    <form id="form2" name="form2" method="post" action="../Clases/Usuario.php" target="visual" class="escalar" >
       <div id="caso3" >
            <p> <input id="func2" type="hidden" name="func" size="4" value="4" /></p>
            <p> <input id="listDel" type="hidden" name="list" size="1" value="1" /></p>
       </div>
   </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
		$("#form2").submit();	
	});		

</script>
</html>

               