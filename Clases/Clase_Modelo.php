<script src="../js/jquery.js"></script>
<script src="../js/events.js"></script>
<?php
    session_start();
    require("Clase_Conexion.php");
    $bd = new Clase();
    Class Modelo{
        static function Select_mysql($campos, $tablas, $condiciones=""){
            global $bd;
            echo "Select ".$campos." from ".$tablas." ".$condiciones;
            $consulta=$bd->ejecutar("Select ".$campos." from ".$tablas." ".$condiciones);//Consulta SQL
             return $consulta;
        }
        static function Insert_mysql($campos, $tablas, $valores){
            global $bd;
            echo "Insert  into ".$tablas." (".$campos.") values (".$valores.")";
            $consulta=$bd->ejecutar("Insert  into ".$tablas." (".$campos.") values (".$valores.")");//Consulta SQL
            return $consulta;
            
        }
        static function Update_mysql($tabla, $campos, $condiciones=""){
            global $bd;
            $bd->ejecutar("update ".$tabla." set ".$campos." ".$condiciones);
        }
        static function Delete_mysql($tablas, $condiciones){
            global $bd;
            echo "Delete from ".$tablas." where ".$condiciones;
            $bd->ejecutar("Delete from ".$tablas." where ".$condiciones);
        }
        static function Query_mysql($sql){
            global $bd;
            $bd->ejecutar($sql);
        }
        public function Login($name, $pass){
            echo $name." ".$pass;
            $consulta=$this->Select_mysql("status","Login", "where users = '".$name."' and pass = '".md5($pass)."'");//Consulta SQL
            if(current($consulta[0])=="admin"){  // Usuario administrador
                $_SESSION['user'] = $name;
                $_SESSION['status'] = "admin";
                echo "<script> permisos(1)</script>";  //Script para abriri ventaana administración
            }
            else if(current($consulta[0])==="user"){
                $_SESSION['user'] = $name;
                $_SESSION['status'] = "user";
                echo "<script> permisos(2)</script>";  //Script para abrir ventana usuario
            }/**/
        }
        

		
    }            
?>