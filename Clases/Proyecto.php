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
            if(($_POST['func']==19)){ ///Nuevo Proyecto
                $cad = "";
                foreach($_POST as $nombre_campo => $valor){
                    if($nombre_campo == 'pass1');    
                    else if($valor==''){
                       $asignacion = "NULL,";
                    }  
                    else {
                        $asignacion = "'".$valor."',";

                    }
                    eval($asignacion);
                    $cad = $cad .$asignacion; 
                   // }   
                }
                $cad1 = explode(",",$cad);
                $campos = 'nombre, fecha_inicio, fecha_fin, empresa, contacto, estado';
                $tablas = 'proyecto';
                $valores = "".$cad1[0].",".$cad1[1].",".$cad1[2].",".$cad1[3].",".$cad1[4].",".$cad1[5]."";
                $this->proyectoNew($campos, $tablas, $valores);
                    
                $campos = "id_func, id_emp";
                $tablas = "func_emp";
                $valores = "'".$_POST['funcionario1']."', '".$_POST['empresa1']."'";
                $this->proyectoNew($campos, $tablas, $valores);
                 echo "<script>alert('Proyecto creado exitosamente');</script>";
                
            }
            else if($_POST['func']==20){///Listado proyectos
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Proyecto.php","multipart/form-data");
                $texto=$this->ProyectoList(0);
                $valores=$this->ProyectoList(1);
                
               # echo print_r($texto);
                #echo "<br>";
                #echo  print_r($valores);
                
                $formulario .= $form->openTable("tableClass","2","PROYECTO");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Proyecto:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("contactosList",$texto, $valores, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","21");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","22");
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
            else if($_POST['func']==21){ 
                $this->ProyectoDel();
                echo "<script>alert('Proyecto Eliminado exitosamente');</script>";
            }
           
            else if($_POST['func']==22){
                global $form;
                
                if($_POST['flagMod']==2){
                    $cad1 = $this->CamposNull();
                    $campos = " nombre=".$cad1[0].", fecha_inicio=".$cad1[1].", fecha_fin=".$cad1[2].", empresa=".$cad1[3].", contacto=".$cad1[4].", estado=".$cad1[5];
                    $condiciones = " where cod_proyecto=".$cad1[6]."";
                    $this->ProyectoUpdate("proyecto",$campos, $condiciones );	
                    echo "<script>alert('Proyecto actualizado exitosamente');</script>";

                }
                else if($_POST['flagMod']==1){
                    $condiciones = " where cod_proyecto = '".$_REQUEST['contactosList']."'";
                    $consulta1=$this->ProyectoSelect("*", "proyecto", $condiciones);//Consulta SQL	$consulta
                    

                    $formulario = $form->openform("formMod","formSQL","divFrame","post","Proyecto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","2","PROYECTO");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Nombre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","nombre","", "".$consulta1[0]['nombre']."");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Fecha Inicio :");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","fecha_ini","", "".$consulta1[0]['fecha_inicio']."","Fecha", "Fecha");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Fecha Cierre:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addInput("text","fecha_fin","", "".$consulta1[0]['fecha_fin']."", "Fecha1", "Fecha");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $consultEmp = $this->ProyectoSelect("cod_empresa, nombre", "empresa");
                    foreach ($consultEmp as $valor) {
                        $texto[] = $valor[1];
                        $valores[] = $valor[0];
                    }
                    $formulario .= $form->openColumna("1","Empresa:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("empresa1",$texto, $valores, "" ,"", "filtro_emp_cont('../Clases/Contacto.php',3, 97)", "empresa1");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $consultContac = $this->ProyectoSelect("cod_contacto, nombre_1", "contacto", "where empresa=".$consulta1[0]['empresa']."");
                    foreach ($consultContac as $valor) {
                        $texto1[] = $valor[1];
                        $valores1[] = $valor[0];
                    }
                    $formulario .= $form->openColumna("1","Contacto:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("contacto1",$texto1, $valores1, "" ,"", "", "contacto1");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $texto[0]="Abierto";$texto[1]="Cerrado";
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Estado:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("estado",$texto, $texto, "" ,"", "", "estado");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","proy_id","","".$_REQUEST['contactosList']."");
                    $formulario .= $form->addInput("hidden","func","","22");
                    $formulario .= $form->addInput("hidden","flagMod","","2");
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                    $formulario .= $form->closeHeader();
                    $formulario .= $form->closeTable();
                    $formulario .= $form->closeform();
                    echo $formulario;
                }
                
            }
            else if($_POST['func']==53){ ///////////////lista Proyectos
                if($_POST['flagList']==1){
                    global $form;
                    $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Proyecto.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","3","PROYECTO");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Filtrar por:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $valores=array("Ver Todos","Nombre","Estado","Empresa","Contacto","Fecha Inicio","Fecha Fin");
                    $texto=array("2","3","4","5","6","7","8");
                    $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","");
                    $formulario .= $form->addInput("text","Filtro");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","func","", "53");
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
                    if($_POST['Filtro']==''){
                        $_POST['Filtro']=NULL;
                    }   
                    if($_POST['flagList']==2){
                        $filter = "";
                    } 
                    else if($_POST['flagList']==3){
                        $filter = " and proyecto.nombre='".$_POST['Filtro']."'";
                    } 
                    else if($_POST['flagList']==4){
                        $filter = " and proyecto.estado='".$_POST['Filtro']."'";
                    } 
                    else if($_POST['flagList']==5){
                        $filter = " and empresa.nombre='".$_POST['Filtro']."'";
                    } 
                    else if($_POST['flagList']==6){
                        $filter = " and contacto.nombre_1='".$_POST['Filtro']."'";
                    } 
                    else if($_POST['flagList']==7){
                        $filter = " and proyecto.fecha_inicio='".$_POST['Filtro']."'";
                    } 
                    else if($_POST['flagList']==8){
                        $filter = " and proyecto.fecha_fin='".$_POST['Filtro']."'";
                    } 
                    $sql = "Set @num=0";
                    $this->ProyectoSet($sql);
                    $consulta1 = $this->ProyectoSelect("count(*)", "proyecto");
                    $consulta=$this->ProyectoSelect("@num:=@num+1 as 'cantidad', proyecto.nombre,  proyecto.estado, proyecto.fecha_inicio , proyecto.fecha_fin, empresa.nombre, contacto.nombre_1 ", " proyecto, empresa, contacto ", " where empresa.cod_empresa=proyecto.empresa and contacto.cod_contacto=proyecto.contacto ".$filter."limit ".$_POST['pag'].",10");
                    global $form;
                    echo "<div class='divFrame'>";
                    $formulario .= $form->openTable("tableClass","6","PROYECTO");
                    $formulario .= $form->addInput("hidden","func","", "53", "funNext");
                    $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                    $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Nombre");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Fecha Inicio");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Fecha Fin");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Empresa");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Contacto");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Estado");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();

                    if($consulta1[0]['count(*)']>10) 
                        $max=10;
                    else $max=$consulta1[0]['count(*)'];
                    for($i = 0; $i <$max; $i++) {
                        $formulario .= $form->openFila();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['fecha_inicio']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['fecha_fin']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['nombre_1']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['estado']."");
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
    
    function proyectoNew($campos, $tabla, $valores){
            global $modelo;
            $modelo->Insert_mysql($campos, $tabla, $valores);
    }
    function ProyectoDel(){
        global $modelo;
        echo $_REQUEST['contactosList'];
        $modelo->Delete_mysql("proyecto", " cod_proyecto = '".$_REQUEST['contactosList']."'");
    }    
    function ProyectoSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function ProyectoList($index){
        global $modelo;
        $consulta = $modelo->Select_mysql("nombre, cod_proyecto", "proyecto", "");
        $i=0;
        //echo print_r($consulta)."<br>";
        foreach ($consulta as $valor) {
            $array[] = $valor[$index];
        }
        //echo print_r($array);
        return $array;
    }
    function ProyectoUpdate($tabla, $campos){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos);
    }
    function ProyectoSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>