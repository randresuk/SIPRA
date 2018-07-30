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
    <form id="form3" name="form3" method="post" action="../Clases/Usuario.php" target="visual" class="divFrame escalar">
        
    </form>  		
</body>
<script language="javascript">
    $(document).ready(function() {
        // $("#form3").submit();
            var parametros = {
                "func" : 50,
                "pag": 0,
                "flagList":1
            }
            $(".next").live("click", function(e){
                next($("#funNext").val(),$("#pag").val(), $("flagList").val());
             });
             $(".atras").live("click", function(e){
                next($("#funNext").val(),$("#pag").val()-2, $("flagList").val());
             }); 
            next("../Clases/Usuario.php",50,0,1);
    });		
   
</script>
</html>

               