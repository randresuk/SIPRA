<?php
error_reporting(E_ERROR);
Class Clase{
            static $conn="";
            static $_instance;
		
            public function __construct(){
              $this->conectar();
	    }
	    /*Método para la conexión con la base de datos SQL*/
	    public function conectar(){
		/* Array asociativo con la información de la conexion */
                $connectionInfo = array( "UID"=>$this->usuario,"PWD"=>$this->password);
                global $conn;
                //$conn = mysql_connect("sql300.260mb.net", "n260m_16768497", "Colombia"); 
                $conn = mysql_connect("localhost", "root", "1234"); 
                mysql_select_db("Barras", $conn);
                if( $conn == false ){
                        echo "No es posible conectarse al servidor.</br>";
                        die( print_r( mysql_error(), true));

                }
	    } 
	  
            public function ejecutar($sql){
                    global $conn;
                    $stmt = mysql_query($sql);
                    if( $stmt == false ) {
                           die( print_r(mysql_error(), true));
                         //return mysql_error();
                        //$resultados[] = mysql_error();
                    }	
                    while( $row = mysql_fetch_array( $stmt) ) {
                        //echo  "<div class='php_view' >Usuario  , ".$row[0]."</div>";
                        $resultados[] = $row;
                        // return $row[0];
                    }
                     //$row = mysql_fetch_array($stmt);
                     //echo $resultados[0];
                    if ((strpos($sql,'Select')!==FALSE) )
                        if (isset($resultados))
                            return $resultados;

             }
	   
	   
}
	
?>