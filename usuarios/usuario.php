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

    <form id="formUser" name="form1" method="post" action="../Clases/Usuario.php" target="visual" class="escalar" >
       <div id="caso"  class="divFrame">
       		<table class="tableClass"  >
            <tbody>
            	<tr>
                    <th colspan="2"> <strong> USUARIO</strong></th>
                </tr>
            	<tr class="osc">	
                     <td>
                    	 Cédula:
                     </td>   
                     <td>    
                         <input type="text" class="obligatorio" name="cedula" placeholder="Ingrese Cédula" size="40" /> *
                     </td>  
                </tr>
                <tr class="clr">
                	<td>
             			<p> Primer Nombre:</p>
                    </td>
                    <td>    
                        <p> <input type="text" name="nom1" placeholder="Primer Nombre" size="40" class="obligatorio"/> *</p>
                    </td>    
                </tr>    
                <tr class="osc">
             		<td>
                    	<p> Segundo Nombre:</p>
                    </td>
                    <td>    
                         <input type="text" name="nom2" size="40"placeholder="Segundo Nombre" /></p>
                    </td>    
                </tr>
                <tr class="clr">   
                	<td> 
		            	<p> Primer Apellido: </p>
                    </td>
                    <td>   
                    	<p><input type="text" name="ape1" placeholder="Primer Apellido" size="40" class="obligatorio">*</p>
                    </td>    
                </tr>   
                <tr class="osc">
                	<td>
	             		<p> Segundo Apellido:</p>
                    </td>
                    <td>
                    	<p> <input type="text" name="ape2" size="40" placeholder="Segundo  Apellido"/></p>
                    </td>    
                </tr>
           		<tr class="clr">
                	<td>
                    	<p> Fecha Nacimiento: </p>
                    </td> 
                    <td>  
                        <p><input type="text" id="Fecha" name="fecha_nac" placeholder="AAAA-MM-DD" size="40" class="obligatorio"> *</p>
                    </td>    
                </tr>  
                <tr class="osc">  
                	<td>
		            	<p> Teléfono Local: </p>
                    </td>
                    <td>    
                        <p><input type="text" id="telf" name="tel" size="40" placeholder="Teléfono"></p>
                    </td>    
                </tr>
                <tr class="clr">    
		            <td>
                    	<p> Celular: </p>
                    </td> 
                    <td>   
                    	<p><input type="text" name="celular" size="40" placeholder="Celular"></p>
                    </td>    
                </tr>
                <tr class="osc">
                	<td>
                    	<p> Direccion: </p>
                    </td>
                    <td>
                        <p><input type="text" name="direccion" size="40" placeholder="Dirección"></p>
                    </td>    
                </tr>    
             	<tr class="clr">
	                <th colspan="2">
                		<p><input type="button"   value="Enviar" onclick="verForm(1)" ></p>
    				</th>                   
                </tr>
              </tbody>  
            </table>        
       </div>
       <div id="caso2" class="divFrame">
       		<table class="tableClass"  >
	            <tbody>
                	<tr>
                        <th colspan="2"> <strong> USUARIO</strong></th>
                    </tr>
                	<tr class="osc">	
                         <td>
                            Nickname Usuario:
                         </td>
                         <td>
                            <input type="text" id="user" class="empty" name="Nickname" size="40" placeholder="Usuario"/>
                         </td>
                    </tr>    
                    <tr class="clr">
                    	 <td>
        	    			Contraseña: 
                         </td>
                         <td>
                            <input type="password" id="passw" class="empty passw" name="pass" size="40" placeholder="Contraseña"></p>
                         </td>
                     </tr> 
                     <tr class="osc">	
                         <td>      
			            	 Confirmar Contraseña: 
                          </td>
                          <td>
                             <input type="password" id="passw2" class="empty passw" name="pass1" size="40" placeholder="Contraseña"></p>
                         </td>  
                     </tr>
                     <tr class="clr">
                     	<th colspan="2">    
                            <p> <select name='status' size='1'>
                                <option  name='option1' value="admin" size="40">Administrador</option>
	                        <option  name='option2' value="user" size="40">Usuario</option>
                                </select>
                            </p>
                          </th>
                      </tr> 
                      <tr class="osc">	
                          <input type="hidden" name="func" size="2" value="2" />
                         
                       </tr>
                      <tr class="clr">      
                      	<th colspan="2">
			            	<p><input type="button" onclick="verForm(2)" value="Enviar" style="width:40px; "/></p>
                        </th>    
                      </tr>
                  </tbody>  
            </table>          
            
       </div>
   </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
		$("#caso").show();
		$("#caso2").hide();
		$("#Fecha").blur(function(){
                    accept = validar_fecha($("#Fecha").val());
                    if(!accept) $("#Fecha").val('');
                });	
	
                 $(".passw").blur(function(){
                     if(($("#"+this.id+"").val().length)<6){
                        alert("Debe ingresar mínimo 6 carácteres");
                        $("#"+this.id+"").val('');
                     }  
                     else if(($("#"+this.id+"").val().length)>30){
                        alert("Debe ingresar máximo 30 carácteres");
                        $("#"+this.id+"").val('');
                    }   
                    
                 });
                 
                $("#user").blur(function(){
                    var parametros = {
                        "func" : 100,
                        "userName": $("#user").val()
                    }   
                    $.ajax({
                        data:  parametros,
                        url:   '../Clases/Usuario.php',
                        type:  'post',
                        success:  function (response) {
                            var lista = response.split("###");
                            if(lista[1] == '1')
                               alert("Este usuario ya existe");
                           }
                     });
                }); 
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

               