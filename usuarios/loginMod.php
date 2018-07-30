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
    <form id="form1" name="form1" method="post" action="../Clases/Usuario.php" target="visual" class="escalar" >
        <p> <input id="func3" type="hidden" name="func" size="3" value="4" /></p>
        <p> <input id="listMod" type="hidden" name="list" size="1" value="3" /></p>
    </form>		
</body>
<script language="javascript">
	$(document).ready(function() {
            $("#form1").submit();
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
                        url:   "../Cases/Usuario.php",
                        type:  "post",
                        success:  function (response) {
                            var lista = response.split("###");
                            if(lista[1] == "1")
                               alert("Este usuario ya existe");
                           }
                     });
                }); 
			
	
});		

</script>
</html>

               