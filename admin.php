<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    session_start(); //Función para gestionar la sesion de los usuarios.
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/regla.css" />
<title>Servibarras</title>
</head>
<body>
		<div id="header">
    		<div id="logo2">
              <div align="center"><a href="http://www.servibarras.com/web/">
                <img src="images/LOGO.png" alt="logo" width="120" height="100" align="left">
              </a>
              </div>
            </div>
                <ul class="nav">
                    <li><a >USUARIO</a>
                        <ul>
                            <li>
                                <a id="func_new">Crear</a>
                            </li>
                            <li>
                                <a id="func_del">Eliminar</a>
                            </li>
                            <li>
                                <a >Modificar</a>
                                <ul>
                                    <li>
                                        <a id="func_mod">Datos</a>
                                    </li>
                                    <li>
                                        <a id="pass_mod">Login</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a id="list_users">Listar</a>
                            </li>
                        </ul>   
                    </li>
                    
                     
                    <li><a >PROYECTOS</a>
                	<ul>
                            <li>
                                <a> PROYECTO</a>
                                <ul>
                                    <li>
                                    <a id="proy_new">Crear</a>
                                    </li>
                                    <li>
                                        <a id="proy_del">Eliminar</a>
                                    </li>
                                    <li>
                                        <a id="proy_mod">Modificar</a>
                                    </li>
                                    <li>
                                        <a id="list_proyects">Listar</a>
                                    </li>
                                </ul>    
                            </li>
                            <li><a >EMPRESA</a>
                                <ul>
                                    <li>
                                            <a id="emp_new">Crear</a>
                                    </li>
                                    <li>
                                            <a id="emp_del">Eliminar</a>
                                    </li>
                                    <li>
                                            <a id="emp_mod">Modificar</a>
                                    </li>
                                    <li>
                                        <a id="list_emp">Listar</a>
                                    </li>

                                </ul>
                             </li>
                            <li>
                                <a >CONTACTO</a>
                                <ul>
                                    <li>
                                            <a id="conct_new">Crear</a>
                                    </li>
                                    <li>
                                            <a id="conct_del">Eliminar</a>
                                    </li>
                                    <li>
                                            <a id="conct_mod">Modificar</a>
                                    </li>
                                    <li>
                                        <a id="list_contact">Listar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                </li>
                <li> 
                    <a> COMERCIAL </a>
                    <ul>
                        <li>
                            <a>Producto</a>
                            <ul>
                                <li>
                                <a id="prod_new">Crear</a>
                            </li>
                            <li>
                                <a id="prod_del">Eliminar</a>
                            </li>
                            <li>
                                <a id="prod_mod">Modificar</a>
                            </li>
                            <li>
                                <a id="list_products">Listar</a>
                            </li>
                            </ul>
                        </li>
                        <li>
                            <a >Cotización</a>
                            <ul>
                                    <li>
                                    <a id="cot_new">Crear</a>
                                </li>
                                <li>
                                    <a id="cot_del">Eliminar</a>
                                </li>
                                <li>
                                    <a id="cot_mod">Modificar</a>
                                </li>
                                <li>
                                    <a id="list_cot">Listar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>    
                <li><a >SOPORTE TECNOLÓGICO</a>
                    <ul>
                        <li>
                            <a id="os_new">Crear</a>
                        </li>
                        <li>
                            <a id="os_cons">Eliminar</a>
                        </li>
                        <li>
                            <a id="os_mod">Modificar</a>
                        </li>
                        <li>
                            <a id="list_OS">Listar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a id="conocimiento">CONOCIMIENTO</a>
                     <ul>
                       <!-- <li>
                            <a id="conocimientoUp">Carga</a>
                        </li>
                        <li>
                            <a id="conocimientoDown">Descarga</a>
                        </li>-->
                    </ul>
                </li>
                <li>
                    <a href="cerrar.php">Cerrar Sesión</a>
                </li>    
                </ul>
        </div>
        <!--<div class="formulario">-->
        <div class="leftBlock">
        	<div id="vinculos">
              <ul>
                <li>
                  <div id="inter_leftt" class="vinc_left"> <img src="images/soluciones.jpg"  width="200" height="80" border="0" /></div>
                </li>
                <li>
                  <div id="inter_leftt2" class="vinc_left"> <img src="images/vip.jpg"  width="200" height="200" border="0" /></div>
                </li>
              </ul>
            </div>
		</div>
        <div class="formMain">
            <form id="formP" name="formP" method="post" action="default.php" target="visual" class="escalar" >
                 <iframe id="ventana" width="100%" height="550 px" scrolling="no" frameborder="0" id="visual" name="visual" style="border:0px none" class="escalar">
                 </iframe>
            </form>
        </div>        
           <!-- </div><formMain-->
</body>
<script src="js/jquery.js"></script>
<script src="js/events.js"></script>

</html>


