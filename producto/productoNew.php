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
  <form id="formEmpr" name="formEmpr" method="post" action="../Clases/Producto.php" target="visual" class="escalar" >
       <div id="divEmprNew" class="divFrame" >
       		<table class="tableClass"  >
            <tbody>
                <tr>
                    <th colspan="2">
                        <strong> PRODUCTOS</strong>
                    </th>
                </tr>
            	<tr class="">	
		             <td>
       		 			 Nombre: 
                     </td>    
                     <td>
                         <input type="text" name="nombre"  placeholder="Nombre" size="40" >*
                     </td>   
                </tr>
                 <tr class="">	
		             <td>    
			           Valor: 
                     </td>
                     <td>
                      <input type="text" name="valor" placeholder="Valor" size="40">*
                     </td>
                 </tr>
                 <tr class="">	
		             <td>    
			              Cantd. Disponible: 
                      </td>
                      <td>
                          <input type="text" name="cant_disp" placeholder="Cantidad" size="40" >*
                      </td>
                 </tr>
                    
             		   <input type="hidden" name="func" size="3" value="27" >
                       
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
			
	
});		

</script>
</html>

               