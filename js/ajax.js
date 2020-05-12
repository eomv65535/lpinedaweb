function objetoAjax() {
   var xmlhttp = false;
   try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      }
   catch(e) {
      try {
         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
         }
      catch(E) {
         xmlhttp = false;
         }
      }
   if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
      xmlhttp = new XMLHttpRequest();
      }
   return xmlhttp;
   }


function getEditorValue( instanceName ) {
   var oEditor = FCKeditorAPI.GetInstance( instanceName ) ;
   return oEditor.GetXHTML( true ) ;
   }

function setEditorValue( instanceName, text ) {
   var oEditor = FCKeditorAPI.GetInstance( instanceName ) ;
   oEditor.SetHTML( text ) ;
   }

function MyFCKClass() {
   this.UpdateEditorFormValue = function() {
      for ( i = 0; i < parent.frames.length; ++i )if ( parent.frames[i].FCK )parent.frames[i].FCK.UpdateLinkedField();
      }
   }
// instantiate the class
var MyFCKObject = new MyFCKClass();
function start_Int33() {
	refrescalo();
   intval = window.setInterval("refrescalo()", 60000);
   }

function maxia(txarea) {
   total = 250;
   tam = txarea.value.length;
   str = "";
   str = str + tam;
   Digitado.innerHTML = str;
   Restante.innerHTML = total - str;
   if (tam > total) {
      aux = txarea.value;
      txarea.value = aux.substring(0, total);
      Digitado.innerHTML = total;
	  Restante.innerHTML = 0; 
	  }
   }

function isEmailAddress(s) {
   var filter = /^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/;
   // var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
   if (s.length == 0 ) return true;
   if (filter.test(s)) return true;
   return false;
   }
   
function ajuste(inicio, an) {
   divFormulario = document.getElementById('pagi');
   ajax = objetoAjax();
   ajax.open("POST", "utiles/pagina_eomv.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("pagina=" + inicio + "&an=" + an)
   }

function trae_modal(cual) {
  var divFormulario = document.getElementById('myModal1');
   ajax = objetoAjax();
   ajax.open("POST", "traemodal.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
        	 divFormulario.innerHTML = ajax.responseText
			if(cual>2)
			 	calendario();
		 }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("cual=" + cual)
   }   

function valida_login_ajax()
 {
   var ax = new objetoAjax();
   ax.open("POST", "valida_login.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	
         if(ax.responseText == 1) 
			document.formi.submit();
         else
		  {  		 
		   swal("ERROR!!!", atxt26, "error");
		   $("#us").addClass("has-error");
		   document.formi.email.focus();
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("email=" + document.formi.email.value+"&clave="+document.formi.clave.value);
 }
 
 function valida_cliente_existente()
 {
   var ax = new objetoAjax();
   ax.open("POST", "valida_not_equal.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  

         if(ax.responseText == 1) 
		  {
			registra_cliente_nuevo();
		  }
         else
		  {
		   $("#cd").removeClass("has-error");		  		 
		   
		   if(ax.responseText == 3) 
			 {
			  swal("ERROR!!!", atxt29, "error"); 
			  document.formr.email.focus();  
			 }
		   $("#cd").addClass("has-error");
		   $("#connor").css("display","block");		   
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_clientes="+document.formr.id_clientes.value+"&email="+document.formr.email.value);
 }
 
 function registra_cliente_nuevo()
 {
   var ax = new objetoAjax();
   ax.open("POST", "registra_cliente_nuevo.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
         if(ax.responseText == 1) 
			document.formr.submit();
         else
		  {
		   $("#cd").removeClass("has-error");		  		 
		   swal("ERROR!!!", atxt30, "error");
		   $("#cd").addClass("has-error");
		   document.formr.email.focus();
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_clientes="+document.formr.id_clientes.value+"&nombres="+document.formr.nombres.value+"&apellidos="+document.formr.apellidos.value+"&email="+document.formr.email.value+"&clave="+document.formr.clave.value+"&fec_nac="+document.formr.fec_nac.value);
 }
 
function valida_olvido()
  {
   
	if(!revisa_campo("#email","email","",atxt12))		 
		return false;	
	if(!emailCheck(document.formo.email.value))	
	  {		 
		swal("ERROR!!!", atxt7, "error");
		$("#em").addClass("has-error");
		document.formo.email.focus();		
		$("#connor").css("display","block");		
		return false;
	  }	
	if(!revisa_campo("#fec_nac","fec_nac","",atxt16))		 
		return false;  	  
	if(!revisa_campo("#clave","clave","",atxt13))		 
		return false;	
	if(!revisa_campo("#clave2","clave2","",atxt14))		 
		return false;	
	if(document.formo.clave2.value!=document.formo.clave.value)
	{
		swal("ERROR!!!", atxt15, "error");
		$("#c1").addClass("has-error");
		$("#c2").addClass("has-error");
		document.formo.clave.focus();		
		$("#connor").css("display","block");		
		return false;
	}	
   var ax = new objetoAjax();
   ax.open("POST", "valida_olvido.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
         if(ax.responseText == 1) 
		  {		  	  		   
		   swal(atxt40, atxt31, "success");		   
		   trae_modal(1);
		  }
         else
		  {
		   $("#cd").removeClass("has-error");		  		 
		   swal("ERROR!!!", atxt32, "error");
		   $("#cd").addClass("has-error");
		   document.formo.email.focus();
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_clientes=0&email="+document.formo.email.value+"&clave="+document.formo.clave.value+"&fec_nac="+document.formo.fec_nac.value);
 }
 
 function envia_mcail()
  {	  
   var ax = new objetoAjax();
   ax.open("POST", "send.php");
   ax.onreadystatechange = function() {	   
      if (ax.readyState == 4) {	  
         if(ax.responseText == 1) 
		  {
		   swal(atxt40, atxt33, "success");
		   document.formac.reset();
		  }
         else
		  {
		    
		   $("#cd").removeClass("has-error");		  		 
		  swal("ERROR!!!", atxt34, "error");
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("name="+document.formac.nombres.value+"&email=" + document.formac.xemail.value+"&message="+document.formac.mensaje.value+"&subject="+document.formac.asunto.value);
 }
 
function filtra_productos()
 {
  var data = $("form").serialize(); 
		$.ajax({
		url: "busca_productos2.php", 
		type: "POST",
		async: true,
		cache: false,
		data: data, 
		success: function(data){ 
			$("#losprst").html(data);
		}
	});
 } 
 
function buscar_cantidad()
 {
   var divFormulario = document.getElementById('cantidadx');
   var ajax = objetoAjax();
   ajax.open("POST", "busca_cantidad.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/loading_spinner.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send()
 } 
 
function agrega_vector_ajax()
{
	var ax = new objetoAjax();
	var	 selectOrigen=document.getElementById("lacantidades");
   ax.open("POST", "agrega_product_vector.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  	  		
			swal(atxt40, atxt36, "success");
		  $("#sometn").html(ax.responseText);
			cuenta_vector();		   
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_detalle=0&id_producto="+document.getElementById("id_producto").value +"&cant_producto=" +  selectOrigen.options[selectOrigen.selectedIndex].value);
} 

function cuenta_vector()
{
   var ax = new objetoAjax();
   ax.open("POST", "cuenta_vector.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  $("#sometn").html(ax.responseText);		   	   		  
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send(null);
} 

function valida_si_esta_carrito()
{
	 var ax = new objetoAjax();
   ax.open("POST", "valida_si_vector.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  if(ax.responseText==1)
			  $("#estatagico").html('<h3 class="active" style="color:#fff;"><div align="center">Producto en el Carrito</div></h3><br><br><a href="resumenc"><button class="btn yoco center-block">PAGAR</button></a><br>')
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_producto="+document.getElementById("id_producto").value);
} 

function refresca_carro_oculto()
{
   var ax = new objetoAjax();
   ax.open("POST", "busca_prod_carrito.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  $("#carritox").html(ax.responseText);		   
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send(null);
} 

function eliminar_vector(cual)
 {
	 
	  var ax = new objetoAjax();
   ax.open("POST", "eliminar_matriz_productos.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  swal(atxt40, atxt42, "success");
		  cuenta_vector();	
		  document.formm.submit();	 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("position="+cual);
	 
 }
 
function eliminar_vector2(cual)
 {
	 
	  var ax = new objetoAjax();
   ax.open("POST", "eliminar_matriz_productos.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		    cuenta_vector();
		 	refresca_carro_oculto();
			refresca_resumen_carro();
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("position="+cual);
	 
 } 
 
 function refresca_resumen_carro()
{
   var ax = new objetoAjax();
   ax.open("POST", "busca_prod_carrito_resumen.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  $("#resumenelvarro").html(ax.responseText);		   
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send(null);
} 

function busca_precio_dinamico()
 {
   var divFormulario = document.getElementById('preciodinamico');  
   var selectOrigen = document.getElementById('lacantidades');  
   var ajax = objetoAjax();
   ajax.open("POST", "busca_precio_dinamico.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("cual=" + selectOrigen.options[selectOrigen.selectedIndex].value)
 } 
 
function ajuste_otro(lapagina) {	
	
		
		main_string="id_categoria="+document.formita.id_categoria.value+"&id_search="+document.formita.id_searchy.value+"&lapagina="+lapagina;
		$.ajax({
			type: "POST",
			url: "busca_productos.php",
			data: main_string, 
			cache: false,
			success: function(html){				
				$("#losprst").html(html);						
			}
			});				
	} 

function ajuste_otro22(lapagina) {	
	
		
		main_string="id_categoria="+document.formita.id_categoria.value+"&id_scategoria="+document.formita.id_scategoria.value+"&id_search="+document.formita.id_searchy.value+"&orden="+document.formita.lorden.value+"&lapagina="+lapagina+"&min_price="+document.formita.erminimo.value+"&max_price="+document.formita.ermaximo.value;
		$.ajax({
			type: "POST",
			url: "busca_productos.php",
			data: main_string, 
			cache: false,
			success: function(html){				
				$("#losprst").html(html);						
			}
			});				
	} 

function pagina_blog(lapagina,boton)
{
	var main_string = "lapagina="+lapagina;
		$.ajax({
			type: "POST",
			url: "parablog/busca_blog.php",
			data: main_string, 
			cache: false,
			success: function(html){	
				$(boton).css("display","none");			
				$("#idbloga").append(html);						
			}
			});			 
}

function ajuste_otro2(lapagina) {	
	$("#losprst").html('<img src="img/cargando.gif">');
	var main_string = "lapagina="+lapagina;
		$.ajax({
			type: "POST",
			url: "busca_productos_con_descuentos.php",
			data: main_string, 
			cache: false,
			success: function(html){								
				$("#losprst").html(html);						
			}
			});				
	} 
	
function buscadorcito()
{
		var dataString = 'buscarpalabra='+ document.getElementById("cajabusqueda").value;
		if(document.getElementById("cajabusqueda").value!='')
		 {
			$.ajax({
				type: "POST",
				url: "buscarprods.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#displayo").html(html);					
				}		
				});
		}
	   else	
	   	$("#displayo").html('No hay resultados!');
	$("#displayo").show();
}	

function actualiza_toteca(cual) {		
	var main_string = "cual="+cual;
	$("#trinity").html('');
		$.ajax({
			type: "POST",
			url: "actualiza_toteca.php",
			data: main_string, 
			cache: false,
			success: function(html){				
				$("#trinity").html(html);						
			}
			});				
	} 
	
function busca_imgcatajax(cual) {		
	var main_string = "cual="+cual;
	$("#trinity").html('');
		$.ajax({
			type: "POST",
			url: "busca_imgcatajax.php",
			data: main_string, 
			cache: false,
			success: function(html){				
				$("#trinity").html(html);						
			}
			});				
	} 	
	
function preloader_eomv(cual,valor)
{
	if(cual==3)	
		document.getElementById('id_categoria').value=valor;	
	else if(cual==5)	
		document.getElementById('id_searchy').value=valor;	
	else
		document.getElementById('id_idmrk').value=valor;		
	busca_filtro();	
	ajuste_otro(1);
}	

function otro_modelos(cual)
{
	document.getElementById('id_marca').value=0;
	document.getElementById('id_model').value=cual;	
	busca_filtro();
	ajuste_otro(1);
	$(".dt-sub").hide();
}

function otras_subcats(cual)
{
	document.getElementById('id_cat').value=0;
	document.getElementById('id_scat').value=cual;	
	busca_filtro();
	ajuste_otro(1);
}

function busca_filtro(cual)
{
  main_string="id_categoria="+document.formita.id_categoria.value;
		$.ajax({
			type: "POST",
			url: "busca_filtro.php",
			data: main_string, 
			cache: false,
			success: function(html){				
				$("#lefilters").html(html);						
			}
			});		
 } 

function busca_ciudad()
{
   var divFormulario = document.getElementById('ciux');  
   var selectOrigen = document.getElementById('id_edo');  
   var ajax = objetoAjax();
   ajax.open("POST", "busca_ciudad.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("cual=" + selectOrigen.options[selectOrigen.selectedIndex].value)
 } 
 
function busca_ofic_envio()
{
   var divFormulario = document.getElementById('oficx');  
   var id_emp_envio = document.getElementById('id_emp_envio');  
   var id_edo = document.getElementById('id_edo');  
   var id_ciudad = document.getElementById('id_ciudad');        
   var ajax = objetoAjax();
   ajax.open("POST", "busca_ofic_envio.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("id_emp_envio=" + id_emp_envio.options[id_emp_envio.selectedIndex].value+"&id_edo=" + id_edo.options[id_edo.selectedIndex].value+"&id_ciudad=" + id_ciudad.options[id_ciudad.selectedIndex].value)
 }  
 
function cirra(cual) 
{
	if(cual==3)	
		document.getElementById('id_categoria').value=0;
	else if(cual==4)
		document.getElementById('id_scategoria').value=0;	
	busca_filtro();
	ajuste_otro(1);
}

function envia_rating_ajax()
 {
   var divFormulario = document.getElementById('trarespacasd');  
   var ajax = objetoAjax();
   ajax.open("POST", "envia_ratingblog.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
		
		  if(ajax.responseText == 1) 
		   {	
         	divFormulario.innerHTML = '<p>'+atxt39+'</p>';
		   }
		  else
		   {
			   swal("ERROR!!!", atxt32, "error");
				$("#em").addClass("has-error");	
				return false;
		   } 
	    }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("id_comen=0&estrella="+document.getElementById("estrella").value+"&mensaje="+document.getElementById("memopini").value)
 } 
 
 function envia_codigux()
 {
   if(!revisa_campo("#codigux","codigux","",atxt41))
	return false;	 
   else
    {		
	   var divFormulario = document.getElementById('resultsas');  
	   var ajax = objetoAjax();
	   ajax.open("POST", "envia_codigux.php");
	   ajax.onreadystatechange = function() {
		  if (ajax.readyState == 1) {
			 divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
			 }
		  if (ajax.readyState == 4) {						
				divFormulario.innerHTML = ajax.responseText;			
			}
		  }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("cual="+document.getElementById("codigux").value)
	}
 } 