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
    <form id="formConct" name="formConct" method="post" action="../Clases/Contacto.php" target="visual" class="escalar" >
       <div id="divConctNew" class="divFrame">
       		<table class="tableClass"  >
            <tbody>
            	<tr><th colspan="2"> AGREGAR CONTACTO </th></tr>
            	<tr class="osc">	
		             <td>
			       		 <p> Primer Nombre:</p> </td>
                     <td>
                      	<input type="text" name="nom1" placeholder="Primer Nombre" size="40">*
                     </td>
                </tr> 
                <tr class="clr">	
		             <td>       
            			 <p>Segundo Nombre:</p>
                     </td> 
                     <td>
                     	<p><input type="text" name="nom2" placeholder="Segundo Nombre" size="40"></p>
                     </td>
                </tr>
                <tr class="osc">	
		             <td>        
             			<p> Primer Apellido:</p>
                     </td>
                     <td>
                        <p> <input type="text" name="ape1" placeholder="Primer Apellido" size="40">*</p>
                     </td>
                </tr>
                <tr class="clr">	
		             <td>        
			            <p> Segundo Apellido:</p>
                     </td>
                     <td>
                      	<p><input type="text" name="ape2" placeholder="Segundo Apellido" size="40"></p>
                      </td>
                </tr>
                <tr class="osc">	
		             <td>      
			            <p> Teléfono: </p>
                     </td>
                     <td>
                        <p><input type="text" id="telf" name="tel" placeholder="Teléfono" size="40">*</p>
                     </td>
                </tr>
                <tr class="clr">	
		             <td>        
			            <p> Celular: </p>
                      </td>
                      <td>
                        <p><input type="text" name="celular" placeholder="Celular" size="40"></p>
                      </td>
                 </tr>
                  <tr id="prdtbl1" class="clr">	
		             <td>     
			            <p> Empresa: </p>
                     </td>
                     <td><select id="empresa1" name='empresa1' size='1' placeholder="Empresa" size="40"></select>
                     </td>
                 </tr>
                 <tr class="osc">	
		                   
			            <p> <input type="hidden" name="func" size="2" value="7" /></p>
                     
                  </tr>
                <tr class="oclr">	
		             <th colspan="2">        
			             <p><input type="submit"   value="Enviar"  /></p>
                      </th>
                 </tr>
            </tbody>
          </table>               
       </div>
       
   </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
		lists('../Clases/Contacto.php',2, 99,0);
		$("#telf").blur(function(){
                    if(($("#"+this.id+"").val().length)<7){
                        alert("Debe ingresar mínimo 7 números");
                        $("#"+this.id+"").val('');
                     }  
                     else if(($("#"+this.id+"").val().length)>7){
                        alert("Debe ingresar máximo 7 números");
                        $("#"+this.id+"").val('');
                    } 
                });
	
});		

</script>
</html>

               