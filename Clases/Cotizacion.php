<link rel="stylesheet" type="text/css" href="../css/regla.css" />

<?php
require("Clase_Modelo.php");
include('Clase_Form.php');
$modelo = new Modelo();
$form = new html_form();
class Usuario {
    
    public function __construct(){
        if(isset($_POST['func']) ){
            if(($_POST['func']==23)){ ///Nueva cotizacion
                
                $cad1 = $this->CamposNull();
                $campos = 'funcionario, empresa, contacto, valor_total';
                $tablas = 'cotizacion'; 
                $valores = "'".$_POST['funcionario1']."',".$cad1[1].",".$cad1[2].",".$cad1[3];
                echo print_r($cad1);
                $this->CotizacionNew($campos, $tablas, $valores);
                $campos = " cod_cotizacion ";
                $tabla = "cotizacion"; 
                $condiciones = " where cod_cotizacion = (SELECT MAX(cod_cotizacion) from cotizacion)";
                $consulta = $this->CotizacionSelect($campos, $tabla, $condiciones);//, $params
                echo "####".$consulta[0]['cod_cotizacion']."####";    
                
                
            }
            
            /////////////Asociar y agregar productos a cotización
		else if($_POST['func']==24){
                        if($_POST['accion']==2){
                            $tabla = " prod_cot ";
                            $condicion = " id_cot='".$_POST['flagCot']."'";
                            $this->CotizacionDel($tabla, $condicion);
                        }
                        if($_POST['accion']>=2){
                            //$cad1 = $this->CamposNull();
                            $campo= " cod_cotizacion";
                            $tabla = " cotizacion ";
                            $condicion = " where funcionario='".$_POST['funcionario1']."' and empresa='".$_POST['empresa1']."' and contacto=".$_POST['contacto1']."";
                            $consulta = $this->CotizacionSelect($campo, $tabla, $condicion);//, $params
                            $tabla1 = " prod_cot ";
                            $campos = " id_prod, id_cant, id_cot ";
                            $condiciones = " ".$_POST['producto'].",".$_POST['unidades'].",".$consulta[0]['cod_cotizacion']." ";
                            $this->CotizacionNew($campos, $tabla1, $condiciones);
                        }
                        else{
                            $campo = " cod_cotizacion ";
                            $tabla = " cotizacion ";
                            $condicion = " where cod_cotizacion = (SELECT MAX(cod_cotizacion) from cotizacion)";
                            $consulta = $this->CotizacionSelect($campo, $tabla, $condicion);//, $params
                            $tabla1 = " prod_cot ";
                            $campos = "id_prod, id_cant, id_cot ";
                            $Condicion = " ".$_POST['producto'].",".$_POST['unidades'].",".$consulta[0]['cod_cotizacion'];
                            $this->CotizacionNew($campos, $tabla1, $Condicion);
                        }
					
		}
		
            else if($_POST['func']==25){
                $tabla = " prod_cot ";
                $condiciones = " id_cot='".$_POST['cotList']."'";
                $this->CotizacionDel($tabla, $condiciones);
                $tabla = "cotizacion";
                $condiciones = " cod_cotizacion='".$_POST['cotList']."'";
                $this->CotizacionDel($tabla, $condiciones);
                echo "<script>alert('Cotización Eliminada exitosamente');</script>";
            }
            else if($_POST['func']==26){///Listado Cotización
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Cotizacion.php","multipart/form-data");
                $texto=$this->CotizacionList(0);
                $valores=$this->CotizacionList(1);
                
                $formulario .= $form->openTable("tableClass","2","COTIZACIÓN");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Cotización:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("cotList",$texto, $texto, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","25");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","27");
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
            
            else if($_POST['func']==27){
                global $form;
                
                if($_POST['flagMod']==2){
                    $cad1 = $this->CamposNull();
                    echo print_r($cad1);
                    /*
                    $sql = "update  cotizacion set funcionario=?, empresa=?, contacto=? , valor_total=? where cod_cotizacion=?";
                    $campos = " funcionario=".$cad1[0].", empresa=".$cad1[1].", contacto=".$cad1[2].", valor_total=".$cad1[3];
                    $condiciones = " where cod_cotizacion=".$cad1[4]."";
                    $this->CotizacionUpdate("cotizacion",$campos, $condiciones );	
                    echo "<script>alert('Cotizacion actualizado exitosamente');</script>";
                       */
                }
                else if($_POST['flagMod']==1){
                    $condiciones = " where cod_cotizacion = '".$_REQUEST['cotList']."'";
                    $consulta1=$this->CotizacionSelect(" * ", " cotizacion ", $condiciones);//Consulta SQL $consulta
                    

                    $formulario = $form->openform("formMod","formSQL","divFrame","post","Cotizacion.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","2","COTIZACIÓN");
                    $formulario .= $form->openFila();
                    $consultcot = $this->CotizacionSelect("cedula, primer_nombre", "funcionario");
                    foreach ($consultcot as $valor) {
                        $texto[] = $valor[1];
                        $valores[] = $valor[0];
                    }
                    $formulario .= $form->openColumna("1","funcionario:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("funcionario1",$texto, $texto, "" ,"", "filtro_func_emp('../Clases/Cotizacion',2,95)", "funcionario1");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $consultEmp = $this->CotizacionSelect("cod_empresa, nombre", "empresa", "where cod_empresa = '".$_REQUEST['cotList']."'");
                    foreach ($consultEmp as $valor) {
                        $texto[] = $valor[1];
                        $valores[] = $valor[0];
                    }
                    echo print_r($consultEmp);
                    $formulario .= $form->openColumna("1","Empresa:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("empresa1",$texto, $valores, "" ,"", "filtro_emp_cont('../Clases/Contacto.php',3, 97)", "empresa1");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->openFila();
                    $consultContac = $this->CotizacionSelect("cod_contacto, nombre_1", "contacto", " where empresa=".$consultEmp[0]['cod_empresa']."");
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
                    $valoresStatus = array("Administrador","Usuario");
                    $textoStatus = array("admin","user"); 
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Estado:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $formulario .= $form->addSelect("estado",$valoresStatus, $textoStatus, "" ,"", "", "estado");
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
            else if($_POST['func']==56){ ///////////////lista Cotizacion
                if($_POST['flagList']==1){
                    global $form;
                    $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Cotizacion.php","multipart/form-data");
                    $formulario .= $form->openTable("tableClass","3","COTIZACIÓN");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Filtrar por:");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1");
                    $valores=array("Ver Todos","Funcionario","Empresa","Contacto","Valor Total");
                    $texto=array("2","3","4","5","6");
                    $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","");
                    $formulario .= $form->addInput("text","Filtro");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();
                    $formulario .= $form->addInput("hidden","func","", "56");
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
                    $sql = "Set @num=0";
                    $this->CotizacionSet($sql);
                    $consulta1 = $this->CotizacionSelect("count(*)", "cotizacion");
                    $campos = " @num:=@num+1 as 'cantidad', funcionario.primer_nombre,  empresa.nombre, cotizacion.valor_total, contacto.nombre_1 ";
                    $tablas = "cotizacion, empresa, contacto, funcionario";
                    $condicines = "where  funcionario.cedula=cotizacion.funcionario and empresa.cod_empresa=cotizacion.empresa and contacto.cod_contacto=cotizacion.contacto ".$filter." limit ".$_POST['pag'].",10";
                    $consulta=$this->CotizacionSelect($campos, $tablas, $condiciones);
                    global $form;
                    echo "<div class='divFrame'>";
                    $formulario .= $form->openTable("tableClass","4","COTIZACIÓN");
                    $formulario .= $form->addInput("hidden","func","", "56", "funNext");
                    $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                    $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openColumna("1","Funcionario");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Empresa");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->openColumna("1","Contacto");
                    $formulario .= $form->closeColumna();
                    
                    
                    $formulario .= $form->openColumna("1","Valor Total");
                    $formulario .= $form->closeColumna();
                    $formulario .= $form->closeFila();

                    if($consulta1[0]['count(*)']>10) 
                        $max=10;
                    else $max=$consulta1[0]['count(*)'];
                    for($i = 0; $i <$max; $i++) {
                        $formulario .= $form->openFila();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['primer_nombre']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['nombre']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['nombre_1']."");
                        $formulario .= $form->closeColumna();
                        $formulario .= $form->openColumna("1","".$consulta[$i]['valor_total']."");
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
            
            else if($_POST['func']==95){// Nueva Consulta de Empresas por funcionario
			$consulta1=$this->CotizacionSelect(" id_emp", " func_emp ","where id_func = '".$_POST['funcionario1']."'");
                        for($i = 0, $c = count($consulta1); $i < $c; $i++) {
                            $consulta=$this->CotizacionSelect(" cod_empresa, nombre", " empresa ","where cod_empresa = '".$consulta1[$i]['id_emp']."'");
                             echo "<option  name='option1' value=".($consulta[0]['cod_empresa']).">".($consulta[0]['nombre'])."</option>";
			}
            }
            else if($_POST['func']==96){// Nueva Consulta de Funcionarios
			$consulta=$this->CotizacionSelect(" cedula, primer_nombre", " funcionario ");
                        for($i = 0, $c = count($consulta); $i < $c; $i++) {
                            echo "<option  name='option1' value=".($consulta[$i]['cedula']).">".($consulta[$i]['primer_nombre'])."</option>";
			}
            }
            else if($_POST['func']==97){// Nueva Consulta de Contactos
			$consulta=$this->CotizacionSelect(" cod_contacto, nombre_1", "contacto"," where empresa='".$_POST['empresa1']."' ");
                        for($i = 0, $c = count($consulta); $i < $c; $i++) {
                            echo "<option  name='option1' value=".($consulta[$i]['cod_contacto']).">".($consulta[$i]['nombre_1'])."</option>";
			}
            }    
            else if($_POST['func']==98){// Nueva Consulta de p
			$consulta=$this->CotizacionSelect(" codigo_prod, nombre, valor", " producto ");
                        for($i = 0, $c = count($consulta); $i < $c; $i++) {
                            echo "<option  ' name='option1'  valor=".($consulta[$i]['valor'])." value=".($consulta[$i]['codigo_prod']).">".($consulta[$i]['nombre'])."</option>";
			}
		}
            else if($_POST['func']==111){// Nueva Consulta de p
                echo "<script>alert('Cotización creada exitosamente');</script>";
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
    
    function CotizacionNew($campos, $tabla, $valores){
            global $modelo;
            $modelo->Insert_mysql($campos, $tabla, $valores);
    }
    function CotizacionDel($tabla, $condiciones){
        global $modelo;
        $modelo->Delete_mysql($tabla, $condiciones);
    }    
    function CotizacionSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function CotizacionList($index){
        global $modelo;
        $consulta = $modelo->Select_mysql(" * ", "cotizacion", "");
        foreach ($consulta as $valor) {
            $array[] = $valor[$index];
        }
        echo print_r($array);
        return $array;
    }
    function CotizacionUpdate($tabla, $campos){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos);
    }
    function CotizacionSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>