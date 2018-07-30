<link rel="stylesheet" type="text/css" href="../css/regla.css" />
<?php
require("Clase_Modelo.php");
include('Clase_Form.php');
$modelo = new Modelo();
$form = new html_form();
class Usuario {
    /////////Constructor  Siempre ingresa a esta función cuando se crea una instancia de la clase usuario
    public function __construct(){ 
        if(isset($_POST['func']) ){  ///Pregunta si se se envío la variable func por el metodo post
            if(($_POST['func']==2)){  
                if((isset($_POST['pass']))&&(isset($_POST['pass1']))){// Se enviaron las variable pass y pass1 ???
                    if($_POST['pass'] == $_POST['pass1']){ 
                        $this->UsuarioNew(); //Funcion para crear nuevo Usuario
                    }
                    else 
                        echo "<script>alert('Las contraseñas no son iguales');</script>";
                }
            }
            else if($_POST['func']==3){ ///Eliminar Usuario
                $this->UsuarioDel();  //Función para Eliminar usuario
                echo "<script>alert('Usuario Eliminado exitosamente');</script>";
            }
            else if($_POST['func']==4){
                global $form;
                $boton = $_POST['list'];
                $formulario = $form->openform("form1","formSQL","divFrame","post","Usuario.php","multipart/form-data");
                $valores=$this->UsuarioList();
                foreach ($valores1 as $valor) {
                        $texto[] = $valor[1];
                        $valores[] = $valor[0];
                    }
                $formulario .= $form->openTable("tableClass","2","Usuarios");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Usuario:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addSelect("radio1",$valores,$valores, "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                if($boton==1){
                    $formulario .= $form->addInput("hidden","func","","3");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Eliminar");
                }
                else if($boton==2){
                    $formulario .= $form->addInput("hidden","func","","5");
                    $formulario .= $form->openFila();
                    $formulario .= $form->openHeader("2");
                    $formulario .= $form->addInput("submit","operar","","Actualizar");
                }
                else if($boton==3){
                    $formulario .= $form->addInput("hidden","func","","90");
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
            else if($_POST['func']==5){
                global $form;
                $consulta = $this->UsuarioSelect("id_user", "Login", " where users='".$_REQUEST['radio1']."'");
                $consulta1 = $this->UsuarioSelect("*", "funcionario", " where id_user = '".$consulta[0]['id_user']."'");
                
                $formulario = $form->openform("formMod","formSQL","divFrame","post","Usuario.php","multipart/form-data");
                $formulario .= $form->openTable("tableClass","2","USUARIO");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Cédula:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","cedula","", "".$consulta1[0]['cedula']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Primer Nombre:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","nom1","", "".$consulta1[0]['primer_nombre']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Segundo Nombre:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","nom2","", "".$consulta1[0]['segundo_nombre']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Primer Apellido:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","ape1","", "".$consulta1[0]['primer_apellido']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Segundo Apellido:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","ape2","", "".$consulta1[0]['segundo_apellido']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Fecha Nacimiento:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","fecha_nac","", "".$consulta1[0]['fecha_nacimiento']."", "Fecha", "Fecha");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Teléfono Local:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","tel","", "".$consulta1[0]['tel_local']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Celular:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","celular","", "".$consulta1[0]['tel_cel']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Dirección:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","direccion","", "".$consulta1[0]['direccion']."");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->addInput("hidden","id_us","","".$consulta1[0][9]."");
                $formulario .= $form->addInput("hidden","func","","6");
                $formulario .= $form->openHeader("2");
                $formulario .= $form->addInput("submit","operar","","Actualizar");
                $formulario .= $form->closeHeader();
                $formulario .= $form->closeTable();
                $formulario .= $form->closeform();
                echo $formulario;
            }
            else if($_POST['func']==6){
                $cad = "";
                foreach($_POST as $nombre_campo => $valor){
                    //if($nombre_campo!='funcionario1'){    
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
                   // }   
                }
                $cad1 = explode(",",$cad);
                $cad = "cedula=".$cad1[0].", primer_nombre=".$cad1[1].", segundo_nombre=".$cad1[2].", primer_apellido=".$cad1[3].", segundo_apellido=".$cad1[4].", fecha_nacimiento=".$cad1[5].", tel_local=".$cad1[6].", tel_cel=".$cad1[7].", direccion=".$cad1[8]."  where id_user = '".$_REQUEST['id_us']."'";
                $this->UsuarioUpdate("funcionario", $cad);
                echo "<script>alert('Usuario actualizado exitosamente');</script>";
            }
             else if($_POST['func']==50){
                        if($_POST['flagList']==1){
                            global $form;
                            $formulario = $form->openform("form1","formSQL","divFrame","post","../Clases/Usuario.php","multipart/form-data");
                            $formulario .= $form->openTable("tableClass","3","USUARIO");
                            $formulario .= $form->openFila();
                            $formulario .= $form->openColumna("1","Filtrar por:");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1");
                            $valores = array("Ver Todos","Nombre","Cédula","Nickname","Tipo Usuario"); 
                            $texto = array("2","3","4","5","6");
                            $formulario .= $form->addSelect("flagList",$valores, $texto, "");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->openColumna("1","");
                            $formulario .= $form->addInput("text","Filtro");
                            $formulario .= $form->closeColumna();
                            $formulario .= $form->closeFila();
                            $formulario .= $form->addInput("hidden","func","", "50");
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
                                $filter = " and funcionario.primer_nombre='".$_POST['Filtro']."'";
                            } 
                            else if($_POST['flagList']==4){
                                $filter = " and funcionario.cedula='".$_POST['Filtro']."'";
                            } 
                            else if($_POST['flagList']==5){
                                $filter = " and Login.users='".$_POST['Filtro']."'";
                            } 
                            else if($_POST['flagList']==6){
                                $filter = " and Login.status='".$_POST['Filtro']."'";
                            } 
                                $sql = "Set @num=0";
                                $this->UsuarioSet($sql);
                                $consulta1 = $this->UsuarioSelect("count(*)", "Login, funcionario", " where Login.id_user=funcionario.id_user ".$filter."");
                                $consulta=$this->UsuarioSelect("@num:=@num+1 as 'cantidad', Login.users, funcionario.primer_nombre, funcionario.cedula", "Login, funcionario", "where Login.id_user=funcionario.id_user ".$filter." limit ".$_POST['pag'].",10");
                                global $form;
                                echo "<div class='divFrame'>";
                                $formulario .= $form->openTable("tableClass","4","USUARIOS");
                                $formulario .= $form->addInput("hidden","func","", "50", "funNext");
                                $formulario .= $form->addInput("hidden","flagList","", "'".$_POST['flagList']."'");
                                $formulario .= $form->addInput("hidden","pag","", "'".++$_POST['pag']."'", "pag");
                                $formulario .= $form->openFila();
                                $formulario .= $form->openColumna("1","Cantidad");
                                $formulario .= $form->closeColumna();
                                $formulario .= $form->openColumna("1","Nickname");
                                $formulario .= $form->closeColumna();
                                $formulario .= $form->openColumna("1","Nombre");
                                $formulario .= $form->closeColumna();
                                $formulario .= $form->openColumna("1","Cédula");
                                $formulario .= $form->closeColumna();
                                $formulario .= $form->closeFila();
                                
                                if($consulta1[0]['count(*)']>10) 
                                    $max=10;
                                else $max=$consulta1[0]['count(*)'];
                                for($i = 0; $i <$max; $i++) {
                                    $formulario .= $form->openFila();
                                    $formulario .= $form->openColumna("1","".$consulta[$i]['cantidad']."");
                                    $formulario .= $form->closeColumna();
                                    $formulario .= $form->openColumna("1","".$consulta[$i]['users']."");
                                    $formulario .= $form->closeColumna();
                                    $formulario .= $form->openColumna("1","".$consulta[$i]['primer_nombre']."");
                                    $formulario .= $form->closeColumna();
                                    $formulario .= $form->openColumna("1","".$consulta[$i]['cedula']."");
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
            else if($_POST['func']==90){
                global $form;
                $consulta = $this->UsuarioSelect("*", "Login", " where users='".$_REQUEST['radio1']."'");
                $formulario = $form->openform("formMod","formSQL","divFrame","post","Usuario.php","multipart/form-data");
                $formulario .= $form->openTable("tableClass","2","USUARIO");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Nombre Usuario:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("text","nombre","", "".$consulta[0]['users']."","user");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Contraseña:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("password","pass","", "", "passw", "passw");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Confirmar Contraseña:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1");
                $formulario .= $form->addInput("password","pass2","", "","passw2", "passw");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $valores = array("Administrador","Usuario");
                $texto = array("admin","user");
                $formulario .= $form->openFila();
                $formulario .= $form->openColumna("1","Tipo Usuario:");
                $formulario .= $form->closeColumna();
                $formulario .= $form->openColumna("1","");
                $formulario .= $form->addSelect("status",$valores, $texto,  "");
                $formulario .= $form->closeColumna();
                $formulario .= $form->closeFila();
                $formulario .= $form->addInput("hidden","user_id","","".$_REQUEST['radio1']."");
                $formulario .= $form->addInput("hidden","func","","91");
                $formulario .= $form->openHeader("2");
                $formulario .= $form->addInput("submit","operar","","Actualizar");
                $formulario .= $form->closeHeader();
                $formulario .= $form->closeTable();
                $formulario .= $form->closeform();
                echo $formulario;
                echo '<script language="javascript">
                                $(document).ready(function() {
                                $("#form1").submit();
                                $(".passw").blur(function(){
                                         if(($("#"+this.id+"").val().length)<6){
                                            alert("Debe ingresar mínimo 6 carácteres");
                                            $("#"+this.id+"").val("");
                                         }  
                                         else if(($("#"+this.id+"").val().length)>30){
                                            alert("Debe ingresar máximo 30 carácteres");
                                            $("#"+this.id+"").val("");
                                        }   

                                     });

                                    $("#user").blur(function(){
                                        var parametros = {
                                            "func" : 100,
                                            "userName": $("#user").val()
                                        }   
                                        $.ajax({
                                            data:  parametros,
                                            url:   "Usuario.php",
                                            type:  "post",
                                            success:  function (response) {
                                                var lista = response.split("###");
                                                if(lista[1] == "1")
                                                   alert("Este usuario ya existe");
                                               }
                                         });
                                    }); 


                    });		

                    </script>';	
                
            }
            else if($_POST['func']==91){
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
                        $cad2 = explode("'", $cad1[1]);
                        $this->UsuarioUpdate("Login", "users=".$cad1[0].",pass='".md5($cad2[1])."', status=".$cad1[3]." where users='".$_POST['user_id']."'");
                        echo "<script>alert('Usuario actualizado exitosamente');</script>";
                             
            }
            else if($_POST['func']==100){
                        $consulta=$this->UsuarioSelect("count(*)", "Login", "where users =  '".$_REQUEST['userName']."'");
                        if($consulta[0]['count(*)'] == 1)
                            echo "<script>alert('###1###');</script>";
                        
                }
            
        }
    }
    
    function UsuarioNew(){
            global $modelo; 
            $cad = "";
            $encriptada1 = md5($_POST['pass']);///Encriptación usando md5
            foreach($_POST as $nombre_campo => $valor){
                if($nombre_campo == 'pass1');    
                else if($valor==''){
                   $asignacion = "NULL,";
                }  
                else 
                    $asignacion = "'".$valor."',";
                eval($asignacion);
                $cad = $cad .$asignacion; 
               // }   
            }
            $cad = substr ($cad, 0, strlen($cad) - 3);
            $cad1 = explode(",",$cad);

            $campos = (" users, pass, status ");
            $tablas = (" Login ");
            $valores = "".$cad1[9].", '".$encriptada1."', ".$cad1[12];
            $modelo->Insert_mysql($campos, $tablas, $valores);
            $flagLogin=1;
            $consulta = $modelo->Select_mysql("id_user", " Login ", " where users = ".$cad1[9]." ");
            $campos = ' cedula, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, tel_local, tel_cel, direccion, id_user ';
            $valores = "".$cad1[0].",".$cad1[1].", ".$cad1[2].", ".$cad1[3].", ".$cad1[4].", ".$cad1[5].", ".$cad1[6].", ".$cad1[7].", ".$cad1[8].",".current($consulta[0])."";
            if($flagLogin==1){
                $modelo->Insert_mysql($campos, " funcionario ", $valores);
                echo $con;
                echo "<script>alert('Usuario creado exitosamente');</script>";
            }           
        }
    function UsuarioDel(){
        global $modelo;
        $modelo->Delete_mysql("Login", " users = '".$_REQUEST['radio1']."'");
    }    
    function UsuarioSelect($columna, $tabla, $condicion=""){
        global $modelo;
        $consulta = $modelo->Select_mysql($columna, $tabla, $condicion);
        return $consulta;
    }
    function UsuarioList(){
        global $modelo;
        $consulta = $modelo->Select_mysql("users", "Login", "");
        $i=0;
        foreach ($consulta as $valor) {
            $array[] = $valor[0];
        }
        //echo print_r($array);
        return $array;
    }
    function UsuarioUpdate($tabla, $campos){
        global $modelo;
        $modelo->Update_mysql($tabla, $campos);
    }
    function UsuarioSet($sql){
        global $modelo;
        $modelo->Query_mysql($sql);
    }
    
}
$usuarioClass = new Usuario();
?>