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
  <form id="formcot" name="formcot" method="post" action="../Clases/Cotizacion.php" target="visual" class="escalar" >
       <div id="divEmprNew"  class="divFrame">
       		<table class="tableClass"  >
	            <tbody>
                	<tr><th colspan="2"> COTIZACIÓN</th></tr>
                      <tr><td>Funcionario: </td><td><select id="funcionario1" name='funcionario1' size='1' onchange="filtro_func_emp('../Clases/Cotizacion.php', 2,95)"></select></td></tr>
                      <tr><td>Empresa: </td><td> <select id="empresa1" name='empresa1' size='1' onchange='filtro_emp_cont(3, 97)'></select></td></tr>
                      <tr><td>Contacto: </td><td><select id="contacto1" name='contacto1' size='1'></select></td></tr>
                      <tr id="prdtbl1" class="conteo"><td>Producto: </td><td><select id="producto1" name='producto1' size='1' onchange="valor_total()"></select>    
                              Cant: <input type="text" id="cantds1" name="cantds1" size="4" value="1" onkeyup="valor_total()"></td></tr>
                      <tr><td>Valor Total:</td><td> <input id="Vtotal" type="text" name="total" size="40"></td></tr>
                      <tr><input type="hidden" name="func" size="3" value="111" ></td></tr>
                      <tr><input type="hidden" id ="flagMod" name="flagMod" size="3" value="3" ></td></tr>
                      <tr><input type="hidden" id ="flagCot" name="flagCot" size="100" value="" ></td></tr>
                      <tr><th colspan="2"><input type="button" onclick="addTableRow($('table'),1)"   value="Agregar Productos"  ></th></tr>
                      <tr><th colspan="2"><input type="button"   onclick="submitcot(23,1)" value="Enviar"  ></th></tr>
                 </tbody>
             </table>        
       </div>
       
   </form>		
</body>
<script language="javascript">
$(document).ready(function() {
	lists('../Clases/Cotizacion.php',1, 98);
	//lists(2, 99, 0);
	lists('../Clases/Cotizacion.php',4, 96, 0, 1);
	$("#cantds1").val("1");
	$("#cantds1").change(function(){
		valor_total();
	});
	var timeoutId = setTimeout(function(){
			$("#funcionario1").val('1');
			  filtro_func_emp('../Clases/Cotizacion.php',2,95);
			},500);	
	var timeoutId = setTimeout(function(){
			//$("#funcionario1").val('1');
			 lists('../Clases/Cotizacion.php',3, 97,$("#empresa1").val(), $("#funcionario1").val());
			},800);		
});		

</script>
</html>

               