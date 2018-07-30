<script src="../js/jquery.js"></script>
<script src="../js/events.js"></script>
<?php
    require("Clase_Modelo.php");
   $modelo = new Modelo();
    
class Clase_Controlador {


    //Función principal, siempre accedé a ésta cuando se ccrea una instancia de Clase_Controlador 
    public function __construct(){
        global $modelo;
        if(isset($_POST['user'])){
            echo $_POST['user'];
            $modelo->Login($_POST['user'],$_POST['pass']);
        }
    }
}
$controlador = new Clase_controlador();

?>
