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
  <form id="EmpDel" name="ConctDel" method="post" action="../Clases/Empresa.php" target="visual" class="escalar" >
       <div id="caso3" >
            <p> <input id="func2" type="hidden" name="func" size="2" value="12" /></p>
            <p> <input id="listDel" type="hidden" name="list" size="1" value="1" /></p>
       </div>
   </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
		$("#EmpDel").submit();	
	});		

</script>
</html>

               