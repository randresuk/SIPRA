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
  <form id="formEmpr" name="formEmpr" method="post" action="../Clases/Proyecto.php" target="visual" class="escalar" >
       <div id="divEmprNew" class="divFrame" >
       		<table class="tableClass"  >
            <tbody>
            	<tr>
                	<th colspan="2"> NUEVO PROYECTO</th>
                </tr>
            	<tr class="">	
		             <td>
       		 		 Nombre: 
                     </td>    
                     <td>
                         <input type="text" name="nombre" placeholder="Nombre" size="40"/>*
                     </td>   
                </tr>
                 <tr class="">	
		             <td>    
			        Fecha Inicio: 
                     </td>
                     <td>
                      <input type="text" class="Fecha" id="Fecha" name="fecha_ini" placeholder="AAAA-MM-DD" size="40">*
                     </td>
                 </tr>
                 <tr class="">	
		             <td>    
			        Fecha Fin: 
                      </td>
                      <td>
                          <input type="text" class="Fecha" id="Fecha1" name="fecha_fin" placeholder="AAAA-MM-DD" size="40">
                      </td>
                 </tr>
                 <tr><td>Funcionario: </td>
                     <td><select id="funcionario1" name='funcionario1' size='1' onchange="">
                            <option  name='option1' value="">Seleccione Funcionario</option>
                        </select></td></tr>
                 <tr class="">	
		             <td>        
             			 Empresa: 
                      </td>
                      <td>
                          <select id="empresa1" name='empresa1' size='1' onchange='filtro_emp_cont("..Clase/Cotizacion.php",3, 97)'>
                              <option  name='option1' value="">Seleccione Empresa</option>
                          </select>
                      </td>
                 </tr>
                 <tr class="">	
		             <td>        
             			 Contacto: 
                     </td> 
                     <td> 
                         <select id="contacto1" name='contacto1' size='1'>
                             <option  name='option1' value="">Seleccione Contacto</option>
                         </select>
                     </td>
                 </tr>
                 <tr><td>Estado: </td><td>
                         <select id="estado" name='estado' size='1' onchange="">
                             <option  name='option1' value="Abierto">Abierto</option>
                             <option  name='option1' value="Cerrado">Cerrado</option>
                         </select></td></tr>
                 <tr class="">	
		                  
             		   <input type="hidden" name="func" size="3" value="19" />
                     
                 </tr>    
                 <tr class="">	
		             <th colspan="2">     
             			<input type="submit"   value="Enviar"  />
                      </th>
                  </tr>
              </tbody>
           </table>       
       </div>
       
   </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
            //lists(2, 99, 0);
            lists("../Clases/Cotizacion.php", 4, 96, 0, 1);
            /*var timeoutId = setTimeout(function(){
            $("#funcionario1").val('1');
              filtro_func_emp(2,99);
            },200);	
            var timeoutId2= setTimeout(function(){
            $("#empresa1").val('1');
              filtro_emp_cont(3,97,1);
            },600);	
            */
            $(".Fecha").blur(function(){
                    var idL = this.id; 
                    accept = validar_fecha($("#"+idL).val());
                    if(!accept) $("#"+idL).val('');
                });
	
});		

</script>
</html>

               