function permisos(ACL){///  administrador cuentas
	if(ACL==1){
		parent.location.href='../admin.php';
		//alert(parent.location);
	}
	else if(ACL==2){
		parent.location.href='../funcionario.php';
                
	}
	
}
///////////////////Visualización  datos funcionarios /////////////////////////////////////////////
////  carga formulario para nuevo funcionario
$("#func_new").click(
	function() {
		$("#formP").attr('action','usuarios/usuario.php');
		$("#formP").submit();
	}
);	
////  carga formulario para modíficar funcionario
$("#func_mod").click(
	function() {
		$("#formP").attr('action','usuarios/usuarioMod.php');
		$("#formP").submit(); 
	}
);
////  carga formulario para modíficar login-funcionario
$("#pass_mod").click(
	function() {
		$("#formP").attr('action','usuarios/loginMod.php');
		$("#formP").submit(); 
	}
);
////  carga formulario para borrar funcionario
$("#func_del").click(
	
	function() {
		$("#formP").attr('action','usuarios/usuarioDel.php');
		$("#formP").submit(); 
		
	}
);
////////////////carga Formulario para contactos
//////////Crear contacto
$("#conct_new").click(
	function(){
		$("#formP").attr('action','contacto/contactoNew.php');
		$("#formP").submit();
	}
);
////////Borrar contacto
$("#conct_del").click(
	function(){
		$("#formP").attr('action','contacto/contactoDel.php');
		$("#formP").submit();
	}
);
/////////////Modíficar contacto
$("#conct_mod").click(
	function(){
		$("#formP").attr('action','contacto/contactoMod.php');
		$("#formP").submit();
	}
);
//////////nueva empresa
$("#emp_new").click(
	function(){
		$("#formP").attr('action','empresa/empresaNew.php');
		$("#formP").submit();
	}
);
//////////modíficar empresa
$("#emp_mod").click(
	function(){
		$("#formP").attr('action','empresa/empresaMod.php');
		$("#formP").submit();
	}
);
//////////borrar empresa
$("#emp_del").click(
	function(){
		$("#formP").attr('action','empresa/empresaDel.php');
		$("#formP").submit();
	}
);
//////////Crear Orden Servicio
$("#os_new").click(
	function(){
		$("#formP").attr('action','orden_servicio/OSNew.php');
		$("#formP").submit();
	}
);
//////////Consultar  Orden Servicio
$("#os_cons").click(
	function(){
		$("#formP").attr('action','orden_servicio/OSDel.php');
		$("#formP").submit();
	}
);
//////////Modíficar  Orden Servicio
$("#os_mod").click(
	function(){
		$("#formP").attr('action','orden_servicio/OSMod.php');
		$("#formP").submit();
	}
);
//////////Nuevo Proyecto/////////////////////////////////////////////////////////////////////////////
$("#proy_new").click(
	function(){
		$("#formP").attr('action','proyecto/proyectoNew.php');
		$("#formP").submit();
	}
);
//////////Borrar Proyecto
$("#proy_del").click(
	function(){
		$("#formP").attr('action','proyecto/proyectoDel.php');
		$("#formP").submit();
	}
);
//////////Modíficarar Proyecto
$("#proy_mod").click(
	function(){
		$("#formP").attr('action','proyecto/proyectoMod.php');
		$("#formP").submit();
	}
);
//////////Nueva Cotización//////////////////////////////////////////////////////////////////////////////////
$("#cot_new").click(
	function(){
		$("#formP").attr('action','cotizacion/cotNew.php');
		$("#formP").submit();
	}
);
//////////Eliminar Cotización
$("#cot_del").click(
	function(){
		$("#formP").attr('action','cotizacion/cotDel.php');
		$("#formP").submit();
	}
);
//////////Modíficar Cotización
$("#cot_mod").click(
	function(){
		$("#formP").attr('action','cotizacion/cotMod.php');
		$("#formP").submit();
	}
);
//////////Nuevo Producto/////////////////////////////////////////////////////////////////////////////
$("#prod_new").click(
	function(){
		$("#formP").attr('action','producto/productoNew.php');
		$("#formP").submit();
	}
);
//////////Borrar Producto
$("#prod_del").click(
	function(){
		$("#formP").attr('action','producto/productoDel.php');
		$("#formP").submit();
	}
);
//////////Modíficar Producto
$("#prod_mod").click(
	function(){
		$("#formP").attr('action','producto/productoMod.php');
		$("#formP").submit();
	}
);
////  Link vinculos izquierda
$("#inter_leftt2").click(
	function() {
		$("#formP").attr('action','http://www.servibarras.com/web/multimedia/index56.html');
		$("#formP").submit();
	}
);	
////  Link archivos upload/download
$("#conocimiento").click(
	function() {
		$("#formP").attr('action','archivos/archivo.php');
		$("#formP").submit();
	}
);
$("#conocimiento2").click(
	function() {
		$("#formP").attr('action','archivos/archivo2.php');
		$("#formP").submit();
	}
);
$("#conocimientoUp").click(
	function() {
		$("#formP").attr('action','archivos/archivo.php');
		$("#formP").submit();
	}
);	
////  Link archivos upload/download
$("#conocimientoDown").click(
	function() {
		$("#formP").attr('action','archivos/descarga.php');
		$("#formP").submit();
	}
);	
//////////Fucniones para ocultar formulario de usuario y mostrar formulario para Login
function verForm(flag){ 
	/////Formulario funcionario
	if(flag==1){
		$("#caso2").show();
		$("#caso").hide();
                $(".empty").val('');
	}
	/////Formulario Login/Contacto
	else if(flag==2){
		
		$("#caso").hide();
                if($("#passw").val() == $("#passw2").val()){
                    $("#caso2").hide();
                    $("#formUser").submit(); 
                }else {
                    alert("Las contraseñas no coinciden");
                    $(".passw").val("");
                }
	}
	else if(flag==3){
		cfm = confirm("Borrar Usuario? ");
		
		 if(cfm) {  
			$("#formDel").submit(); 
		 } else {  
			  
		 } 
	}
}

function lists(url, acc, par, par2, par3){
   // alert(url+" "+par+" "+acc);
		var parametros = {
                "func" : par,
                'empresa1' : par2,
                'funcionario1' : par3 
                };
		$.ajax({
                data:  parametros,
                url:   url,
                type:  'post',
                success:  function (response) {
                            if(acc==1){
                                    $("#producto1").append(response);
                                    valor_total();
                            }
                            else if(acc==2){
                                     $("#empresa1").append(response);
                            }
                            else if(acc==3){
                                     $("#contacto1").append(response);
                            }
                            else if(acc==4){
                                     $("#funcionario1").append(response);
                            }
                        }
                });
	
}
function submitcot(pFunc, origen){
		//alert(pFunc+"  "+$("#flagMod").val());
		var parametros = {
					"func" : pFunc,
					"funcionario1" : $("#funcionario1").val(),
					"empresa1" : $("#empresa1").val(),
					"contacto1" : $("#contacto1").val(),
					"total" : $("#Vtotal").val(),
					"flagMod" :  $("#flagMod").val(),
					"flagCot" :  $("#flagCot").val()
				};
			
				$.ajax({
					data:  parametros,
					url:   '../Clases/Cotizacion.php',
					type:  'post',
					success:  function (response) {
                                            var cadd = response.split("####");
                                            $("#cotList").val(cadd[1]);
                                            $("#flagCot").val(cadd[1]);
                                            
                                        }
				 });
				addProductos('../Clases/Cotizacion.php', origen);
}

function addProductos(url, pFunc){
		var cantdConteo = $(".conteo").length, cantFlag=0;
                $('.conteo').each(function(indice, elemento) {
                    var can = $(elemento).find("td input").val();//parent().next();//
                    var prod = $(elemento).find("td select option:selected").attr("value");
                    
                    var parametros = {
                        "func" : 24,
                        "producto" : prod,
                        "unidades" : can,
                        "funcionario1" : $("#funcionario1").val(),
                        "empresa1" : $("#empresa1").val(),
                        "contacto1" : $("#contacto1").val(),
                        "total" : $("#Vtotal").val(),
                        "accion" : pFunc++,
                        "flagCot" :  $("#flagCot").val()
                    };
			
                    $.ajax({
                        data:  parametros,
                        url:   url,
                        type:  'post',
                        success:  function (response) {
                            ++cantFlag;  
                            if(cantFlag == cantdConteo)
                               var timeoutId = setTimeout(function(){
                                       $("#formcot").submit()
                                       ,200});
                            }
                     });
		});
		
}

function filtro_emp_cont(par1, par2){
		$("#contacto1").empty();
		lists('../Clases/Cotizacion.php',par1, par2, $("#empresa1").val());
}

function filtro_func_emp(url, par1, par2){
		$("#empresa1").empty();
		lists(url, par1, par2,0, $("#funcionario1").val());
}

function addTableRow(table, func){
	
	// clonar la ultima fila de la tabla
   // var $tr = $(table).find("tbody tr:has(select:last)").clone();
    var cant = $(".conteo").length;
	var $tr = $("#prdtbl"+cant).clone();
	$tr.find("select").attr("name", function(){
                        //  separar el campo name y su numero en dos partes
                        var parts = this.id.match(/(\D+)(\d+)?/);
                        // crear un nombre nuevo para el nuevo campo incrementando el numero para los previos campos en 1
                        return parts[1] + ++parts[2];
                        // repetir los atributos ids
        }).attr("id", function(){
                        var parts = this.id.match(/(\D+)(\d+)?/);
                        return parts[1] + ++parts[2];
        }).parent().parent().attr("id",function(){
                        //  separar el campo name y su numero en dos partes
                        var parts = this.id.match(/(\D+)(\d+)?/);
                        // crear un nombre nuevo para el nuevo campo incrementando el numero para los previos campos en 1
                       return parts[1] + ++parts[2];
                       // repetir los atributos ids
         }).find("input").attr("name",function(){
                        //  separar el campo name y su numero en dos partes
                        var parts = this.id.match(/(\D+)(\d+)?/); 
                        // crear un nombre nuevo para el nuevo campo incrementando el numero para los previos campos en 1
                        return parts[1] + (cant+1);
                        // repetir los atributos ids*/
	}).val('1');
    // añadir la nueva fila a la tabla
     $("#prdtbl"+cant).after($tr);
	//$tr.find("td:has(select)").append('<option value=1>My option</option>');
	if(func==1)
		valor_total();
}

function valor_total(){
	var suma = 0, ind=0;;
	$('.conteo').each(function(indice, elemento) {
			
			var can = $(elemento).find("td input");//parent().next();//
			var prod = $(elemento).find("td select option:selected");
			if(can.val().length < 1)
				can.val("1");
                         suma += parseInt(prod.attr('valor'))*parseInt(can.val());
			 
    });
	$("#Vtotal").val(suma);
}
function validar_fecha(fecha){
            var valFecha = fecha.split("-");
            if((valFecha[1]>12) || (valFecha[1]<=0)){
                alert("El mes debe estar entre 1 y 12");
                valFecha[1] = "";
            }
            if(valFecha[2]>28){
                if((valFecha[1]==2) && ((valFecha[2]>28) || (valFecha[2]<=0)))
                    alert("Para este mes el día debe ser de 1 a 28");
                else if((valFecha[1]==4)||(valFecha[1]==6)||(valFecha[1]==9)||(valFecha[1]==11)
                        && (valFecha[2])>30)
                    alert("Para este mes el día debe ser de 1 a 30");
                else if(valFecha[2]>31)
                    alert("Para este mes el día debe ser de 1 a 31");
                valFecha[2] = "";
            }
            var fechaFinal = valFecha[0]+"-"+valFecha[1]+"-"+valFecha[2];
            return (fechaFinal).match(/([0-9]{4})\-([0-1]{1}[0-9]{1})\-([0-3]{1}[0-9]{1})/);
}
function validar_hora(hora){
        return (hora).match(/([0-2]{1}[0-9]{1})\:([0-5]{1}[0-9]{1})\:([0-5]{1}[0-9]{1})/);
}
////// Funciones para listar 
$("#list_users").click(
	function() {
		$("#formP").attr('action','usuarios/usuarioList.php');
		$("#formP").submit(); 
	}
);
$("#list_emp").click(
	function() {
		$("#formP").attr('action','empresa/empresaList.php');
		$("#formP").submit(); 
	}
);
$("#list_contact").click(
	function() {
		$("#formP").attr('action','contacto/contactoList.php');
		$("#formP").submit(); 
	}
);
$("#list_proyects").click(
	function() {
		$("#formP").attr('action','proyecto/proyectoList.php');
		$("#formP").submit(); 
	}
);
$("#list_products").click(
	function() {
		$("#formP").attr('action','producto/productoList.php');
		$("#formP").submit(); 
	}
);
$("#list_OS").click(
	function() {
		$("#formP").attr('action','orden_servicio/OSList.php');
		$("#formP").submit(); 
	}
);
$("#list_cot").click(
	function() {
		$("#formP").attr('action','cotizacion/cotList.php');
		$("#formP").submit(); 
	}
);
function next(url, lista, pag, tipoCons){
        var parametros = {
             "func" : lista,
            "pag": pag,
            "flagList": tipoCons
        }
        $.ajax({
            data:  parametros,
            url:   url,
            type:  'post',
            success:  function (response) {
                //$cad = response.split("###");
                $("#form3").html(response);
            }
         });
    }

function OS(){
    var parametros = {
    "func" : par,
    'empresa1' : par2,
    'funcionario1' : par3 
    };
    $.ajax({
    data:  parametros,
    url:   '../Clases/',
    type:  'post',
    success:  function (response) {
                            if(acc==1){
                                    $("#producto1").append(response);
                                    valor_total();
                            }
                            else if(acc==2){
                                     $("#empresa1").append(response);
                            }
                            else if(acc==3){
                                     $("#contacto1").append(response);
                            }
                            else if(acc==4){
                                     $("#funcionario1").append(response);
                            }
            }
    });
}
function subir(){
    $("#up").show();  
 }