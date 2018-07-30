<link rel="stylesheet" type="text/css" href="../css/regla.css" />
<script src="../js/jquery.js"></script>
<script src="../js/events.js"></script>
<?php
require("Clase_Modelo.php");
include('Clase_Form.php');
$modelo = new Modelo();
$form = new html_form();
class Usuario {
    
    public function __construct(){
        if(isset($_POST['func']) ){
            if(($_POST['func']==27)){ ///Nuevo producto
                $cad1 = $this->CamposNull();
                $campos = "nombre, valor, cant_disp";
                $valores = "".$cad1[0].", ".$cad1[1].", ".$cad1[2]."";
                $tabla = "producto";
                $this->ProductoInsert($campos, $tabla, $valores);
                echo "<script>alert('Producto creado exitosamente');</script>";
            }
            else if($_POST['func']==28){///Listado Empreas
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Producto.php","multipart/form-data");
                $formulario .= $form->openTable("tableClass","2","PRODUCTOS");
                $formulario .= $form->openFila();
                $texto=$this->ProductoList(0);
                $valores=$this->ProductoList(1);        
                $formulario .= $form->openColumna("1","Producto:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("productosList",$texto, $valores, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","29");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","30");
                    $formulario .= $form->addInput("hidden","flagMod","","1");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                }
                $formulario .= $form->closeHeader();
                $formulario .= $form->closeFila();
                $formulario .= $form->closeTable();
                $formulario .= $form->closeform();
                
                echo $formulario;
            }
            else if($_POST['func']==29){ //Borrar empresa
                $this->ProductoDel();
                echo "<script>alert('Producto Eliminado exitosamente');</script>";
            }
           
            else if($_POST['func']==30){
                global $form;
                
                if($_POST['flagMod']==2){
                    $cad1 = $this->CamposNull();
                    $condiciones = "where codigo_prod=".$cad1[3]."";
                    $campos = "nombre=".$cad1[0].", valor=".$cad1[1].", cant_disp=".$cad1[2];
                    $this->ProductoUpdate("producto",$campos, $condiciones );	
                    echo "<script>alert('Producto actualizado exitosamente');</script>";
                }
                else if($_POST['flagMod']==1){
                    $condiciones = "where codigo_prod = '".$_REQUEST['productosList']."'";
                    $consulta1=$this->ProductoSelect("*", "producto", $condiciones);//Consulta SQL	$consulta
                    
                    $formulario = $form->openform("formMod","formSQL","divFrame","post","Producto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","2","PRODUCTO");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Nombre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","nombre","", "".$consulta1[0]['nombre']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Valor:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","valor","", "".$consulta1[0]['valor']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Cant. Disponible:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","cant_disp","", "".$consulta1[0]['cant_disp']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","prod_id","","".$_REQUEST['productosList']."");
                    $formulario .= $form->addInput("hidden","func","","30");
                    $formulario .= $form->addInput("hidden","flagMod","","2");
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                    $formulario .= $form->closeHeader();
                    $formulario .= $form->closeTable();
                    $formulario .= $form->closeform();
                    echo $formulario;
                }
                
            }
            else if($_POST['func']==54){ ///////////////lista Productos
                if($_POST['flagList']==1){
                    global $form;
                    $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Producto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","3","PRODUCTOS");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Filtrar por:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $valores=array("Ver Todos","Nombre","Valor");
                    $texto=array("2","3","4");
                    $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","");
                    $formulario .= $form->addInput("text","Filtro");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","func","", "54");
                    $formulario .= $form->addInput("hidden","pag","", "0");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("3");
                    $formulario .= $form->addInput("submit","operar","","Filtrar");
                    $formulario .= $form->closeHeader();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->closeTable();
                    $formulario .= $form->closeform();
                    echo $formulario;
                }
                else{
                         if($_POST['flagList']==2){
                            $filter = "";
                        } 
                        else if($_POST['flagList']==3){
                            $filter = " where producto.nombre='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==4){
                            $filter = " where producto.valor='".$_POST['Filtro']."'";
                        }
                        $sql = "Set @num=0";
                        $this->ProductoSet($sql);
                        $consulta1 = $this->ProductoSelect("count(*)", "producto");
                        $consulta=$this->ProductoSelect("@num:=@num+1 as 'cantidad',   producto.nombre,  producto.valor,  producto.cant_disp "," producto ".$filter." limit ".$_POST['pag'].",10");
                        global $form;
                        echo "<div class='divFrame'>";
                        $formulario .= $form->openTable("tableClass","4","PRODUCTO");
                        $formulario .= $form->addInput("hidden","func","", "54", "funNext");
                        $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                        $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                        $formulario .= $form->openFila();
                       
                        $formulario .= $form->openColumna("1","Item");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Descripcion");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Valor    ");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Cantd.Disponible");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->closeFila();

                        if($consulta1[0]['count(*)']>10) 
                            $max=10;
                        else $max=$consulta1[0]['count(*)'];
                        for($i = 0; $i <$max; $i++) {
                            $formulario .= $form->openFila();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['cantidad']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['valor']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['cant_disp']."");
                            $formulario .= $form->closeFila();
                        }

                        $formulario .= $form->closeTable();
                        if($consulta1[0]['count(*)']>10)
                            if($_POST['pag']+1 >= 3){
                                $formulario .= $form->openFila();
                                $formulario .= $form->openHeader("2");
                                $formulario .= $form->addInput("button","next","","Siguiente", "", "next");
                                $formulario .= $form->closeHeader();
                                $formulario .= $form->openHeader("2");
                                $formulario .= $form->addInput("button","atras","","Anterior", "", "atras");
                                $formulario .= $form->closeHeader();
                                $formulario .= $form->closeFila();
                                $formulario .= $form->closeTable();
                            }else{
                                $formulario .= $form->openFila();
                                $formulario .= $form->openHeader("4");
                                $formulario .= $form->addInput("button","next","","Siguiente", "", "next");
                                $formulario .= $form->closeHeader();

                            }
                        echo $formulario;    
                        echo "</div>";
                }
            }
            
        } 
    }
    
    function CamposNull(){
        $cad = "";
        foreach($_POST as $nombre_campo => $valor){
            if($nombre_campo!='funcionario1'){    
                if($valor==''){
                   $asignacion = "NULL,";
                   //$asignacion = "\$" . $nombre_campo . "=NULL";
                }   
                else {
                    $asignacion = "'" . $valor . "',";
                    //$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
                    //$cad ."'". $valor . "',";
                }    
                eval($asignacion);
                $cad = $cad .$asignacion; 
            }   
        }
        $cad1 = explode(",", $cad);
        return $cad1;
    }
    
    function ProductoInsert($campos, $tabla, $valores){
            global $modelo;
            $modelo->Insert_mysql($campos, $tabla, $valores);
    }
    function ProductoDel(){
        global $modelo;
        echo $_REQUEST['contactosList'];
        $modelo->Delete_mysql("producto", " codigo_prod = '".$_REQUEST['contactosList']."'");
    }    
    function ProductoSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function ProductoList($index){
        global $modelo;
        $consulta = $modelo->Select_mysql("nombre, codigo_prod", "producto", "");
        foreach ($consulta as $valor) {
            $array[] = $valor[$index];
        }
        return $array;
    }
    function ProductoUpdate($tabla, $campos, $condiciones){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos, $condiciones);
    }
    function ProductoSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>