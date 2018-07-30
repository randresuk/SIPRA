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
            if(($_POST['func']==7)){ ///Nueva empresa
                $cad1 = $this->CamposNull();
                $campos = "nombre_1, nombre_2, apellido_1, apellido_2, telefono, celular, empresa";
                $valores = "".$cad1[1].", ".$cad1[2].", ".$cad1[3].", ".$cad1[4].", ".$cad1[5].", ".$cad1[6].", ".$cad1[7]."";
                $tabla = "contacto";
                $this->ContactoInsert($campos, $tabla, $valores);
                echo "<script>alert('Contacto creado exitosamente');</script>";
            }
            else if($_POST['func']==8){///Listado Empreas
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Contacto.php","multipart/form-data");
                $formulario .= $form->openTable("tableClass","2","CONTACTOS");
                $formulario .= $form->openFila();
                $texto=$this->ContactoList(0);
                $valores=$this->ContactoList(1);        
                $formulario .= $form->openColumna("1","Contacto :");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("contactosList",$texto, $valores, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","9");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","10");
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
            else if($_POST['func']==9){ //Borrar empresa
                $this->ContactoDel();
                echo "<script>alert('Contacto Eliminado exitosamente');</script>";
            }
           
            else if($_POST['func']==10){
                global $form;
                
                if($_POST['flagMod']==2){
                    $cad1 = $this->CamposNull();
                    $condiciones = "where cod_contacto = '".$_REQUEST['conct_id']."'";
                    $campos = "nombre_1=".$cad1[0].", nombre_2=".$cad1[1].", apellido_1=".$cad1[2].", apellido_2=".$cad1[3].", telefono=".$cad1[4].", celular=".$cad1[5].", empresa=".$cad1[6];
                    $this->ContactoUpdate("contacto",$campos, $condiciones );	
                    echo "<script>alert('Contacto actualizado exitosamente');</script>";
                }
                else if($_POST['flagMod']==1){
                    $condiciones = "where cod_contacto = '".$_REQUEST['contactosList']."'";
                    $consulta1=$this->ContactoSelect("*", "contacto", $condiciones);//Consulta SQL	$consulta
                    
                    $formulario = $form->openform("formMod","formSQL","divFrame","post","Contacto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","2","CONTACTO");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Primer Nombre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","nom1","", "".$consulta1[0]['nombre_1']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Segundo Nombre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","nom2","", "".$consulta1[0]['nombre_1']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Primer Apellido:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","ape1","", "".$consulta1[0]['apellido_1']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Segundo Apellido:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","ape2","", "".$consulta1[0]['apellido_2']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Teléfono:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","tel","", "".$consulta1[0]['telefono']."","", "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Celular:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","celular","", "".$consulta1[0]['celular']."", "", "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Empresa:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $consultEmp = $this->ContactoSelect("cod_empresa, nombre", "empresa");
                    foreach ($consultEmp as $valor) {
                        $texto[] = $valor[1];
                        $valores[] = $valor[0];
                    }
                    $formulario .= $form->addSelect("empresa1",$texto, $valores, "" ,"", "", "empresa1");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","conct_id","","".$_REQUEST['contactosList']."");
                    $formulario .= $form->addInput("hidden","func","","10");
                    $formulario .= $form->addInput("hidden","flagMod","","2");
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                    $formulario .= $form->closeHeader();
                    $formulario .= $form->closeTable();
                    $formulario .= $form->closeform();
                    echo $formulario;
                    echo"<script>lists('../Clases/Contacto.php',2,99);</script>";
                    echo "<script>$('#empresa1 > option[value=".($consulta1[0]['empresa'])."]').attr('selected', 'selected');</script>";
                }
                
            }
            else if($_POST['func']==52){ ///////////////lista Contactos
                if($_POST['flagList']==1){
                    global $form;
                    $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Contacto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","3","CONTACTOS");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Filtrar por:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $valores=array("Ver Todos","Nombre","Apellido","Teléfono","Celular","Empresa");
                    $texto=array("2","3","4","5","6","7");
                    $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","");
                    $formulario .= $form->addInput("text","Filtro");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","func","", "52");
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
                            $filter = " and contacto.nombre_1='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==4){
                            $filter = " and contacto.apellido_1='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==5){
                            $filter = " and contacto.telefono='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==6){
                            $filter = " and contacto.celular='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==7){
                            $filter = " and empresa.nombre='".$_POST['Filtro']."'";
                        }
                        $sql = "Set @num=0";
                        $this->ContactoSet($sql);
                        $consulta1 = $this->ContactoSelect("count(*)", "contacto, empresa", " where empresa.cod_empresa=contacto.empresa".$filter);
                        $consulta=$this->ContactoSelect("@num:=@num+1 as 'cantidad',  empresa.nombre, empresa.telefono as 'telefono2', contacto.nombre_1, contacto.nombre_2, contacto.apellido_1, contacto.apellido_2 ,contacto.telefono, contacto.celular","contacto, empresa " ," where empresa.cod_empresa=contacto.empresa ".$filter." limit ".$_POST['pag'].",10");
                        global $form;
                        echo "<div class='divFrame'>";
                        $formulario .= $form->openTable("tableClass","8","CONTACTOS");
                        $formulario .= $form->addInput("hidden","func","", "52", "funNext");
                        $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                        $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                        $formulario .= $form->openFila();
                        $formulario .= $form->openColumna("1","Nombres");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Apellidos");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Ciudad");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Teléfono");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Celular");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Empresa");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Tel. Empresa");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->closeFila();

                        if($consulta1[0]['count(*)']>10) 
                            $max=10;
                        else $max=$consulta1[0]['count(*)'];
                        for($i = 0; $i <$max; $i++) {
                            $formulario .= $form->openFila();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre_1']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre_2']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['apellido_1']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['apellido_2']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['telefono']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['celular']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['telefono2']."");
                            $formulario .= $form->closeColumna();
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
           else if($_POST['func']==99){// Nueva Consulta de Empresas
			$consulta=$this->ContactoSelect(" cod_empresa, nombre ", " empresa ");
                        echo print_r($consulta);
			for($i = 0, $c = count($consulta); $i < $c; $i++) {
                            echo "<option  ' name='option1' value=".($consulta[$i]['cod_empresa']).">".($consulta[$i]['nombre'])."</option>";
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
    
    function ContactoInsert($campos, $tabla, $valores){
            global $modelo;
            $modelo->Insert_mysql($campos, $tabla, $valores);
    }
    function ContactoDel(){
        global $modelo;
        echo $_REQUEST['contactosList'];
        $modelo->Delete_mysql("contacto", " cod_contacto = '".$_REQUEST['contactosList']."'");
    }    
    function ContactoSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function ContactoList($index){
        global $modelo;
        $consulta = $modelo->Select_mysql("nombre_1, cod_contacto", "contacto", "");
        foreach ($consulta as $valor) {
            $array[] = $valor[$index];
        }
        return $array;
    }
    function ContactoUpdate($tabla, $campos, $condiciones){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos, $condiciones);
    }
    function ContactoSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>