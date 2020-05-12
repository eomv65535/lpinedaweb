function solo_num(res,evt)
{ 
	var valor=document.getElementById(res).value.length;
	var band=46;
	for(var i=0; i<valor;i++) 
	{  
	   if(document.getElementById(res).value.charAt(i)==".")
	   band=13;  
	} 
	key = (document.all) ? evt.keyCode : evt.which;
	if ( (key < 48 || key > 57) && key!=127 && key!=13 && key!=8 && key!=9 && key!=0 && key!=band)
     {
		 return false;
     }
  return true; 
}

function solo_num2(res,evt)
{ 
	var valor=document.getElementById(res).value.length;
	var band=46;
	for(var i=0; i<valor;i++) 
	{  
	   if(document.getElementById(res).value.charAt(i)==".")
	     band=13;  
	} 
	key = (document.all) ? evt.keyCode : evt.which;
	if ( (key < 48 || key > 57) && key!=127 && key!=13 && key!=8 && key!=9 && key!=0 && key!=band)
     {
		 return false;
     }
  return true; 
}

function validar_textarea(e,obj) {
  tecla = (document.all) ? e.keyCode : e.which;
  if (tecla != 13) return;
  filas = obj.rows;
  txt = obj.value.split('\n');
  return (txt.length < filas);
}

function emailCheck (emailStr)
 {
	/* Verificar si el email tiene el formato user@dominio. */
	var emailPat=/^(.+)@(.+)$/; 
	/* Verificar la existencia de caracteres. ( ) < > @ , ; : \ " . [ ] */
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"; 
	/* Verifica los caracteres que son válidos en una dirección de email */
	var validChars="\[^\\s" + specialChars + "\]"; 
	var quotedUser="(\"[^\"]*\")"; 
	/* Verifica si la dirección de email está representada con una dirección IP Válida */ 
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;
	/* Verificar caracteres inválidos */ 
	var atom=validChars + '+';
	var word="(" + atom + "|" + quotedUser + ")";
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$");
	//domain, as opposed to ipDomainPat, shown above. */
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$");
	var matchArray=emailStr.match(emailPat);
	if (matchArray==null) {		
		 swal("ERROR!!!", atxt1, "error");		
		return false;
	}
	var user=matchArray[1];
	var domain=matchArray[2];
	// Si el user "user" es valido 
	if (user.match(userPat)==null) {		
		 swal("ERROR!!!", atxt2, "error");
		return false;
	}
	/* Si la dirección IP es válida */
	var IPArray=domain.match(ipDomainPat);
	if (IPArray!=null) {
		for (var i=1;i<=4;i++) {
			if (IPArray[i]>255) {
				 swal("ERROR!!!", atxt3, "error");
				return false;
			}
		}
	return true;
	}
	
	var domainArray=domain.match(domainPat);
	if (domainArray==null) {
		swal("ERROR!!!", atxt4, "error");
		return false;
	}
	
	var atomPat=new RegExp(atom,"g");
	var domArr=domain.match(atomPat);
	var len=domArr.length;
	if (domArr[domArr.length-1].length<2 || 
	domArr[domArr.length-1].length>3) { 
		swal("ERROR!!!", atxt5, "error");
		return false;
	}
	if (len<2) {
		swal("ERROR!!!", atxt6, "error");
		return false;
	}
	return true;
}

function revisa_campo(el_id_group,el_id_campo,la_compara,mensaje)
 {
	if(document.getElementById(el_id_campo).value==la_compara)
	{
		 document.getElementById(el_id_campo).focus();
		 swal("ERROR!!!", mensaje, "error");
		 return false;
	}
  return true;
 }

function valida_login()
{
	if(!revisa_campo("#email","email","",atxt12))
		return false;	
	if(!emailCheck(document.formi.email.value))	
	  {		 		
		swal("ERROR!!!", atxt7, "error");
		$("#em").addClass("has-error");
		document.formi.email.focus();		
		return false;
	  }	
	if(!revisa_campo("#clave","clave","",atxt8))
		return false;			
	valida_login_ajax();
}

function calendario()
 {
	 
	 $("#fec_nac").inputmask("dd/mm/yyyy");
	 $("#fec_nac2").inputmask("dd/mm/yyyy");
 }  

function calendario2()
 {
	 var calax = (new Date).getFullYear();
	 var cal2az=calax-95;
	 var cal2az3=calax-18;	 
	 $("#fec_nac").inputmask("dd/mm/yyyy", {yearrange: { minyear: cal2az, maxyear: cal2az3 }});
 }

function valida_clienteslo()
{	
	if(!revisa_campo("#nombres","nombres","",atxt10))
		return false;	
	if(!revisa_campo("#apellidos","apellidos","",atxt11))		 
		return false;			
	if(!revisa_campo("#email","email","",atxt12))		 
		return false;	
	if(!emailCheck(document.formr.email.value))	
	  {		 
		swal("ERROR!!!", atxt7, "error");
		$("#em").addClass("has-error");
		document.formr.email.focus();		
		$("#connor").css("display","block");		
		return false;
	  }	
	if(!revisa_campo("#clave","clave","",atxt13))		 
		return false;	
	if(!revisa_campo("#clave2","clave2","",atxt14))		 
		return false;	
	if(document.formr.clave2.value!=document.formr.clave.value)
	{
		 swal("ERROR!!!", atxt15, "error");
		$("#c1").addClass("has-error");
		$("#c2").addClass("has-error");
		document.formr.clave.focus();		
		$("#connor").css("display","block");		
		return false;
	}		
if(!revisa_campo("#fec_nac","fec_nac","",atxt16))		 
		return false;	
	valida_cliente_existente();	
	
}

function cierra_modal(cual)
 {
	 $("#myModal1").css("display","none");
 }
 
 function cierra_modal2(cual)
 {
	 trae_modal(cual);
 }
 
function envia_contacto()
{
		if(!revisa_campo("#nombres","nombres","",atxt10))
			return false;			
		if(!revisa_campo("#xemail","xemail","",atxt12))
			return false;	
		if(!emailCheck(document.formac.xemail.value))	
		  {		 
			swal("ERROR!!!", atxt7, "error");
			document.formac.xemail.focus();		
			return false;
		  }				
		if(!revisa_campo("#asunto","asunto","",atxt17))
			return false; 
		if(!revisa_campo("#mensaje","mensaje","",atxt18))
			return false;	
		envia_mcail();				
} 

function cli_catego(cual,dit,cuanto)
{
	document.formita.cats.value=cual;
	for(i=0;i<cuanto;i++)
		 $("#ctg_"+i).removeClass("active");
	$("#ctg_"+dit).addClass("active"); 
	$('.spancats').css('visibility','visible');
	actualiza_toteca(cual);
}

function agrega_carrito(clase,cual) 
{			
	agrega_vector_ajax();
}

function valida_dor_carrito()
{
	if(!revisa_campo("#direc_cliente","direc_cliente","",atxt21))
			return false;
	if(!revisa_campo("#ciudad_cliente","ciudad_cliente","",atxt22))
			return false;
	if(!revisa_campo("#estado_cliente","estado_cliente","",atxt23))
			return false;	
	if(!revisa_campo("#pais_cliente","pais_cliente","",atxt24))
			return false;
	if(!revisa_campo("#telf_cliente","telf_cliente","",atxt25))
			return false;	
	document.formdir.submit();									
}

function activalo(pw1,pw2)
  {
   pa1=document.getElementById(pw1);
   pa2=document.getElementById(pw2);
   pa1.style.backgroundColor="#FFF";
   pa2.style.backgroundColor="#FFF";
   pa1.disabled=! pa1.disabled;
   pa2.disabled=!pa2.disabled;
  if(pa2.disabled==true)
   {
    pa1.value="";
    pa2.value="";   
    pa1.style.backgroundColor="#EEE";
    pa2.style.backgroundColor="#EEE";
   }
  }
  
 function suiche(campo,campo_datos,state)
{
	$('input[name="'+campo+'"]').bootstrapSwitch('state',state);
	$('input[name="'+campo+'"]').on('switchChange.bootstrapSwitch', function(event, state) {
	var cual;	 
		 if(state)
		 	cual=1
		else
			cual=0;	
		document.getElementById(campo_datos).value=cual;
});
} 

function suiche2(campo,state)
{
	$('input[name="'+campo+'"]').bootstrapSwitch('state',state);
	$('input[name="'+campo+'"]').on('switchChange.bootstrapSwitch', function(event, state) {
		   pa1=document.getElementById('clave');
		   pa2=document.getElementById('clave2');
		   pa1.style.backgroundColor="#FFF";
		   pa2.style.backgroundColor="#FFF";
		   pa1.disabled=! pa1.disabled;
		   pa2.disabled=!pa2.disabled;
		  if(pa2.disabled==true)
		   {
			pa1.value="";
			pa2.value="";   
			pa1.style.backgroundColor="#EEE";
			pa2.style.backgroundColor="#EEE";
		   }	
});
}

function valida_clientes2()
{
	if(!revisa_campo("#nombres","nombres","",atxt10))
		return false;	
	if(!revisa_campo("#apellidos","apellidos","",atxt11))
		return false;	
	if(!revisa_campo("#email","email","",atxt12))
		return false;	
	if(!emailCheck(document.formactdat.email.value))	
	  {		 
		swal("ERROR!!!", atxt7, "error");
		$("#em").addClass("has-error");
		document.formactdat.email.focus();		
		return false;
	  }	
	if(document.formactdat.acepto.checked==true)
	 {  
		if(!revisa_campo("#clave","clave","",atxt13))
			return false;	
		if(!revisa_campo("#clave2","clave2","",atxt14))
			return false;	
		if(document.formactdat.clave2.value!=document.formactdat.clave.value)
		{
			 swal("ERROR!!!", atxt15, "error");
			$("#c1").addClass("has-error");
			$("#c2").addClass("has-error");
			document.formactdat.clave.focus();		
			return false;
		}		
	 }
	if(!revisa_campo("#fec_nac","fec_nac","",atxt16))
		return false;	
	document.formactdat.submit();
}
function abrirVlog () {

  $("#myModal1").slideDown(300);
};
function cerrarVlog () {

  $("#myModal1").slideUp(300);
};

function abre_loquees(cuanto)
{
	trae_modal(cuanto);
	abrirVlog();	 
}

function abre_subcat_acordeon(cual)
{
	$(".cajadecategorias"+cual ).slideToggle( "slow");
}

function valida_busqu()
{
	if(!revisa_campo("#id_search","id_search","","Debes Ingresar un valor de Busqueda"))
		return false;
	document.fastback.submit();	
}

function inicia_segundo()
{
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
         	nav:false
        },
        600:{
            items:2,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
			navText: [
			  "<i class='icon-chevron-left icon-white'><</i>",
			  "<i class='icon-chevron-right icon-white'>></i>"
			  ],
            loop:false
        }
    }
})
}

function activa_empenvio()
{
	document.getElementById("id_emp_envio").disabled=false;
}
function redii(url)
{
	window.location=url;
}
function tra_rangos()
{
	$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 100000,
			values: [ 20000, 70000 ],
			slide: function( event, ui ) {  
				$( "#amount" ).val(  ui.values[ 0 ] +" BsF. - " + ui.values[ 1 ] +" BsF.");
			}
		});
	$( "#amount" ).val( ( "#slider-range" ).slider( "values", 0 ) + " BsF. - " + $( "#slider-range" ).slider( "values", 1 )+" BsF." );
}

function cambia_idima(cual)
 {
	 document.getElementById("idioma").value=cual;
	 document.formid.submit();
 }

function cambia_moneda(cual)
 {
	 document.getElementById("moneda").value=cual;
	 document.formam.submit();
 }
 
function get_full_url(url_path)
	{
		var loc = window.location;
		var url = '' + loc.protocol + '//' + loc.host + url_path;
		return url;
	}

function MyEmbeddedFlow(embeddedFlow)
 {
	this.embeddedPPObj = embeddedFlow;
	this.paymentSuccess = function ()
	 {
		this.embeddedPPObj.closeFlow();
		window.location.href = get_full_url('/finpago.php');
	};
			
	this.paymentCanceled = function ()
	 {
		this.embeddedPPObj.closeFlow();
		window.location.href = get_full_url('/pagoc.php');
	};
 if (window != top) {
      top.location.replace(document.location);
   }	
 }
 
 var embeddedPPFlow; 
 var myEmbeddedPaymentFlow;
 
function cargue_paypal()
{
	embeddedPPFlow = new PAYPAL.apps.DGFlow({trigger: 'submitBtn'});			  
	myEmbeddedPaymentFlow = new MyEmbeddedFlow(embeddedPPFlow);
}

function closePayPal(){
     $('#PPDGFrame').remove();
}

 $(".dt-link").on("click", "a", function(e){
      e.preventDefault();
      var indice = $(this).index();
      $(this).add($(".dt-pos-des").eq(indice)).addClass("active").siblings().removeClass("active");

  });

function pon_estrel(cual)
{
	document.getElementById("estrella").value=cual;
	for(i=1;i<=5;i++)
	 {
		$("#stela_"+i).removeClass("uftive");
	 }
	for(i=1;i<=cual;i++)
		$("#stela_"+i).addClass("uftive");		
}

function valida_rating_envia()
{
	if(!revisa_campo("#estrella","estrella","0",atxt37))
			return false;
	if(!revisa_campo("#memopini","memopini","",atxt38))
			return false;
	envia_rating_ajax();		
}

