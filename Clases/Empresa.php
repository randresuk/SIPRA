<link rel="stylesheet" type="text/css" href="../css/regla.css" />
<?php
require("Clase_Modelo.php");
include('Clase_Form.php');
$modelo = new Modelo();
$form = new html_form();
class Usuario {
    
    public function __construct(){
        if(isset($_POST['func']) ){
            if(($_POST['func']==11)){ ///Nueva empresa
                $cad1 = $this->CamposNull();
                $campos = 'nombre, direccion, ciudad, telefono';
                $tablas = 'empresa';
                echo print_r($cad1);
                $valores = "".$cad1[0].",".$cad1[1].",".$cad1[2].",".$cad1[3]."";
                $this->EmpresaInsert($campos, $tablas, $valores);
                    
                $campos = "cod_empresa";
                $tabla = "empresa";
                $condiciones = "where nombre = ".$cad1[0]."";
                $consulta = $this->EmpresaSelect($campos,$tabla,$condiciones);//Consulta SQL

                $campos = "nombre_1, nombre_2, apellido_1, apellido_2, telefono, celular, empresa";
                $valores = "".$cad1[5].", ".$cad1[6].", ".$cad1[7].", ".$cad1[8].", ".$cad1[9].", ".$cad1[10].", '".current($consulta[0])."'";
                $tabla = "contacto";
                $this->EmpresaInsert($campos, $tabla, $valores);
                echo "<script>alert('Empresa creada exitosamente');</script>";

            }
            else if($_POST['func']==12){///Listado Empreas
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Empresa.php","multipart/form-data");
                $texto=$this->EmpresaList(0);
                $valores=$this->EmpresaList(1);
                $formulario .= $form->openTable("tableClass","2","EMPRESA");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Proyecto:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("contactosList",$texto, $valores, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","13");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","14");
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
            else if($_POST['func']==13){ //Borrar empresa
                $this->EmpresaDel();
                echo "<script>alert('Emmpresa Eliminada exitosamente');</script>";
            }
           
            else if($_POST['func']==14){
                global $form;
                
                if($_POST['flagMod']==2){
                    $cad1 = $this->CamposNull();
                    $campos = "nombre=".$cad1[0].", direccion=".$cad1[1].", ciudad=".$cad1[2].", telefono=".$cad1[3];
                    $condiciones = " where cod_empresa='".$_REQUEST['empresa_id']."'";
                    $this->EmpresaUpdate("empresa",$campos, $condiciones );	
                    //echo "<script>alert('Empresa actualizada exitosamente');</script>";
                }
                else if($_POST['flagMod']==1){
                    $condiciones = "where cod_empresa = '".$_REQUEST['contactosList']."'";
                    $consulta1=$this->EmpresaSelect("*", "empresa", $condiciones);//Consulta SQL	$consulta
                    
                    $formulario = $form->openform("formMod","formSQL","divFrame","post","Empresa.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","2","Empresa");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Nombre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","nombre","", "".$consulta1[0]['nombre']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Dirección:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","direccion","", "".$consulta1[0]['direccion']."","", "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Ciudad:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","ciudad","", "".$consulta1[0]['ciudad']."", "", "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Teléfono:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","telefono","", "".$consulta1[0]['telefono']."", "", "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","empresa_id","","".$_REQUEST['contactosList']."");
                    $formulario .= $form->addInput("hidden","func","","14");
                    $formulario .= $form->addInput("hidden","flagMod","","2");
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                    $formulario .= $form->closeHeader();
                    $formulario .= $form->closeTable();
                    $formulario .= $form->closeform();
                    echo $formulario;
                }
                
            }
            else if($_POST['func']==51){ ///////////////lista Empresa
                if($_POST['flagList']==1){
                    global $form;
                    $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Empresa.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","3","EMPRESA");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Filtrar por:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $valores=array("Ver Todos","Nombre","Dirección","Ciudad","Teléfono","Contacto");
                    $texto=array("2","3","4","5","6","7");
                    $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","");
                    $formulario .= $form->addInput("text","Filtro");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","func","", "51");
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
                            $filter = " and empresa.nombre='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==4){
                            $filter = " and empresa.direccion='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==5){
                            $filter = " and empresa.ciudad='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==6){
                            $filter = " and empresa.telefono='".$_POST['Filtro']."'";
                        } 
                        else if($_POST['flagList']==7){
                            $filter = " and contacto.nombre_1='".$_POST['Filtro']."'";
                        } 
                        $sql = "Set @num=0";
                        $this->EmpresaSet($sql);
                        $consulta1 = $this->EmpresaSelect("count(*)", "empresa, contacto"," where  empresa.cod_empresa=contacto.empresa ".$filter);
                        $consulta=$this->EmpresaSelect("@num:=@num+1 as 'cantidad',  empresa.nombre, empresa.direccion, empresa.ciudad, empresa.telefono, contacto.nombre_1,contacto.telefono as 'telefono2'", "empresa, contacto", " where empresa.cod_empresa=contacto.empresa ".$filter." limit ".$_POST['pag'].",10");
                        global $form;
                        echo "<div class='divFrame'>";
                        $formulario .= $form->openTable("tableClass","6","EMPRESA");
                        $formulario .= $form->addInput("hidden","func","", "51", "funNext");
                        $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                        $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                        $formulario .= $form->openFila();
                        $formulario .= $form->openColumna("1","Empresa");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Dirección");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Ciudad");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Teléfono");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Contacto");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","Tel. Contacto");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->closeFila();

                        if($consulta1[0]['count(*)']>10) 
                            $max=10;
                        else $max=$consulta1[0]['count(*)'];
                        for($i = 0; $i <$max; $i++) {
                            $formulario .= $form->openFila();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['direccion']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['ciudad']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['telefono']."");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","".$consulta[$i]['nombre_1']."");
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
    
    function EmpresaInsert($campos, $tabla, $valores){
            global $modelo;
            $modelo->Insert_mysql($campos, $tabla, $valores);
    }
    function EmpresaDel(){
        global $modelo;
        echo $_REQUEST['contactosList'];
        $modelo->Delete_mysql("empresa", " cod_empresa = '".$_REQUEST['contactosList']."'");
    }    
    function EmpresaSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function EmpresaList($index){
        global $modelo;
        $consulta = $modelo->Select_mysql("nombre, cod_empresa", "empresa", "");
        foreach ($consulta as $valor) {
            $array[] = $valor[$index];
        }
        return $array;
    }
    function EmpresaUpdate($tabla, $campos, $condiciones){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos, $condiciones);
    }
    function EmpresaSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>