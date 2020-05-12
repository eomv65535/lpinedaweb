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

function valida_simplon22()
{		
	if(!revisa_campo("#tt","descrip","","Debes Ingresar la zona"))
		return false;		
	document.form1.submit();		
}

function valida_login()
{
	if(!revisa_campo("#email","email","",atxt12))
		return false;	
	if(!emailCheck(document.formi.email.value))	
	  {		 		
		swal("ERROR!!!", atxt7, "error");
		document.formi.email.focus();		
		return false;
	  }	
	if(!revisa_campo("#pass","pass","",atxt8))
		return false;			
	document.formi.submit();
}

function valida_olvido()
{
	if(!revisa_campo("#email","email","",atxt12))
		return false;	
	if(!emailCheck(document.formi.email.value))	
	  {		 		
		swal("ERROR!!!", atxt7, "error");
		document.formi.email.focus();		
		return false;
	  }				
	document.formi.submit();
}

function valida_newusr()
{
	if(!revisa_campo("#nombres","nombres","","Debes Ingresar los Nombres"))
		return false;
	if(!revisa_campo("#apellidos","apellidos","","Debes Ingresar los Apellidos"))
		return false;	
	if(!revisa_campo("#email","email","",atxt12))
		return false;	
	if(!emailCheck(document.form1.email.value))	
	  {		 		
		swal("ERROR!!!", atxt7, "error");
		document.form1.email.focus();		
		return false;
	  }		
	if(!revisa_campo("#id_inmuebles","id_inmuebles","-1","Debes Seleccionar el Inmueble"))
		return false;	
	if(!revisa_campo("#id_apto","id_apto","-1","Debes Seleccionar el Apartamento"))
		return false;		  		
	valida_u();
}

function cargue_fcke()
 {
	var editor1= CKEDITOR.replace('postDesc');
	var editor2= CKEDITOR.replace('postCont');
 }
 
 function cargue_fcke2()
 {
	 CKEDITOR.replace('descrip');
 }
 

function busca_filtro_inmuebles()
{
	if($("#nom_inm").val()=="" && $("#desde").val()=="" && $("#hasta").val()=="" && $("#orden_gral").val()=="-1")
	 {
		swal("ERROR!!!", "Debes Ingresar al menos un Campo de Filtrado", "error");
		return false;
	 }
	else
	 {	
	 	if($("#desde").val()!="" && $("#hasta").val()=="") 
		 {
			swal("ERROR!!!", "Debes seleccionar la fecha hasta", "error");
			return false;
		 }
		else 
		 {
			 if($("#desde").val()=="" && $("#hasta").val()!="")
			 {
				swal("ERROR!!!", "Debes seleccionar la fecha desde", "error");
				return false;
			 }
			else
			 {
				 if(Date.parse($("#desde").val())>Date.parse($("#hasta").val()))
				 {
					swal("ERROR!!!", "La fecha hasta debe ser posterior a la fecha desde", "error");
					return false;
				 }
				else
				 {
					 cargue_inmuebles(1);
				 } 
			 } 
		 }  		
	 }
 } 
 
function resetea_filtro_inmuebles()
{
	document.formita.nom_inm.value=document.formita.desde.value=document.formita.hasta.value="";
	document.formita.orden_gral.selectedIndex=0;
	cargue_inmuebles(1);
}	 

function resetea_filtro_incidencias()
{
	document.formita.involucrado.value=document.formita.aptoinv.value=document.formita.desde.value=document.formita.hasta.value="";
	document.formita.id_tipoi.selectedIndex=document.formita.cualorden.selectedIndex=0;
	cargue_incidencias(1);
}

function asigando()
{
	if(document.getElementById("id_inmueb").selectedIndex>0)
	 {
		 $("#id_inmu_uno_b").val($("#id_inmueb").val());
	 }
	 else if(document.getElementById("id_inmueb").selectedIndex==0)
	 {
		 $("#id_inmu_uno_b").val($("#id_inmu_uno").val());
	 }
}

function busca_filtro_incidencias()
{
	if($("#id_tipoi").val()=="-1" && $("#id_inmu_uno_b").val()=="-1" && $("#involucrado").val()=="" && $("#aptoinv").val()=="" && $("#desde").val()=="" && $("#hasta").val()=="" && $("#cualorden").val()=="-1")
	 {
		swal("ERROR!!!", "Debes Ingresar al menos un Campo de Filtrado", "error");
		return false;
	 }
	else
	 {	
	 	if($("#desde").val()!="" && $("#hasta").val()=="") 
		 {
			swal("ERROR!!!", "Debes seleccionar la fecha hasta", "error");
			return false;
		 }
		else 
		 {
			 if($("#desde").val()=="" && $("#hasta").val()!="")
			 {
				swal("ERROR!!!", "Debes seleccionar la fecha desde", "error");
				return false;
			 }
			else
			 {
				 if(Date.parse($("#desde").val())>Date.parse($("#hasta").val()))
				 {
					swal("ERROR!!!", "La fecha hasta debe ser posterior a la fecha desde", "error");
					return false;
				 }
				else
				 {
					 cargue_incidencias(1);
				 } 
			 } 
		 }  		
	 }
 }
 

function valida_txtabout()
{
	if(!revisa_campo("#des_esp","des_esp","","Debe ingresar la descripción (Español)"))
			return false;					
	if(!revisa_campo("#des_eng","des_eng","","Debe ingresar la descripción (Inglés)"))
			return false;
	document.formi.submit(); 
}

function valida_lnkvideo()
{
	if(!revisa_campo("#des","des","","Ruta del video"))
			return false;					
	document.formi.submit(); 
}



function valida_creari2()
{
	if(!revisa_campo("#id_motivo","id_motivo","-1","Seleccione el Motivo de Reporte"))
		return false;	
	if(!revisa_campo("#id_inmueble","id_inmueble","-1","Seleccione el Inmueble"))
			return false;
	if(!revisa_campo("#aptos","aptos","-1","Seleccione el Apartamento"))
			return false;					
	if(!revisa_campo("#descrip","descrip","","Escriba su comentario"))
			return false;
	busca_reportes2(); 	 
}

function valida_crearadui()
{	
	if(!revisa_campo("#descrip","descrip","","Escriba su comentario"))
			return false; 
	document.formi.submit();	 
}

function carga_upc() //imagen banner
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/indexch.php' : 'server/php/indexch.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|mp4)$/i,
		 maxFileSize: 1073741824,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true    
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_lasimgsch();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_lasimgsch();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function carga_imgabout() //imagen izquierda about
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/indexch_about.php' : 'server/php/indexch_about.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|mp4)$/i,
		 maxFileSize: 1073741824,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true    
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_lasimgsch_about();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_lasimgsch_about();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function carga_imgfondvideo() //imagen izquierda about
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/indexch_ifv.php' : 'server/php/indexch_ifv.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|mp4)$/i,
		 maxFileSize: 1073741824,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true    
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_lasimgsch_ifv();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_lasimgsch_ifv();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function carga_dejacomentario() //imagenes dejar comentario
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/index_img_deja_comen.php' : 'server/php/index_img_deja_comen.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|mp4)$/i,
		 maxFileSize: 10000000,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true    
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_lasimgs_dejacomentario();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_lasimgs_dejacomentario();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function carga_upc2() //imagenes incidencia
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/indexch2.php' : 'server/php/indexch2.php',
         uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png|mp3|mp4)$/i,
		 maxFileSize: 10000000,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true 
	}).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_lasimgsch2();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_lasimgsch2();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');	
				
}

function carga_upc2a() //imagenes incidencia
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/indexch2a.php' : 'server/php/indexch2a.php',
         uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload5').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(mp3)$/i,
		 maxFileSize: 10000000,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
		//imageMaxWidth: 120,
//    	imageMaxHeight: 80,
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,		
        previewCrop: true 
	}).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {            
			  busca_txt_imgch_audio();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
			 busca_txt_imgch_audio();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');	
				
}


function valida_comeni(inci)
{
	if(!revisa_campo("#comen","comen","","Ingrese la descripción del Comentario"))
		return false; 
	guarda_comen(inci); 
}

function valida_comeni33(inci)
{
	if(!revisa_campo("#comen","comen","","Ingrese la descripción del Comentario"))
		return false; 	
	guarda_comen33(inci); 
}

function valida_comeni2(cual,inci)
{

	if(!revisa_campo("#comen","comen","","Ingrese la Respuesta del Comentario"))
		return false;  	
	guarda_comen2(cual,inci); 
}

function unico(quien,indice)
  {

   if(quien==1)
    {
     if(document.forms[0].permite[indice].checked ==true && document.forms[0].nopermite[indice].checked ==true)
	 		document.forms[0].nopermite[indice].checked=false
	}
  else
	{
	 if(quien==2)
    	{
	     if(document.forms[0].permite[indice].checked ==true && document.forms[0].nopermite[indice].checked ==true)
		 		document.forms[0].permite[indice].checked=false
		}
	}	
  }
  
function valida_Inmueble()
 {
	$("#sms_alerta").addClass("alert-error");
	if(!revisa_campo("#titu","titu","","Debes Ingresar el Titulo del Concierto"))
		return false;	
	if(!revisa_campo("#fecha","fecha","","Debes Ingresar la Fecha del Concierto"))
		return false;	
	if(!revisa_campo("#link","link","","Debes Ingresar el Link del Concierto"))
		return false;
	 if(!revisa_campo("#donde","donde","","Debes Ingresar el Lugar del Concierto"))
		return false;
		
	document.form1.submit(); 
 }     
 
function valida_Inmuebleb()
 {
	$("#sms_alerta").addClass("alert-error");
	if(!revisa_campo("#titu","titu","","Debes Ingresar el Titulo del Post"))
		return false;	
	if(!revisa_campo("#fecha","fecha","","Debes Ingresar la Fecha del Post"))
		return false;	
	if(!revisa_campo("#link","link","","Debes Ingresar el Link del Post"))
		return false;
	 if(!revisa_campo("#descrip","descrip","","Debes Ingresar la Descripción del Post"))
		return false;
		
	document.form1.submit(); 
 }   


function valida_ua()
{
	if(!revisa_campo("#nm","nombres","","Debes Ingresar los Nombres del usuario"))
		return false;
	if(!revisa_campo("#nm2","apellidos","","Debes Ingresar los Apellidos del usuario"))
		return false;			
	if(!revisa_campo("#ema","email","","Debes Ingresar el email"))
		return false;
	if(!emailCheck(document.form1.email.value))	
	  {		 
		swal("ERROR!!!", "Debes Ingresar un email valido", "error");				
		document.form1.email.focus();		
		return false;
	  }	
	if(!revisa_campo("#ps1","clave","","Debes Ingresar la clave"))
		return false;
	if(!revisa_campo("#ps2","clavex2","","Debes Confirmar la clave"))
		return false;  	
	if(document.form1.clavex2.value!=document.form1.clave.value)
	{
		swal("ERROR!!!", "Deben coincidir ambas claves", "error");		 		 
		document.form1.clave.focus();		
		return false;
	}	
	if($("#tipo").val()<3) 
		 {
		if($("#seleccionadoscr").val()<1) 
		 {
			swal("ERROR!!!", "Debes Agregar al menos Un (1) Inmueble", "error");
			return false;
		 }
	 }
	valida_u();
}  


function valida_um()
{
	if(!revisa_campo("#nombres","nombres","","Debes Ingresar los Nombres del usuario"))
		return false;
	if(!revisa_campo("#apellidos","apellidos","","Debes Ingresar los Apellidos del usuario"))
		return false;
	if(!revisa_campo("#ema","email","","Debes Ingresar el email"))
		return false;
	if(!emailCheck(document.form1.email.value))	
	  {		 
		swal("ERROR!!!", "Debes Ingresar un email valido", "error");				
		document.form1.email.focus();		
		return false;
	  }		
	if(document.form1.aceptox.checked ==true)
	 {
		if(!revisa_campo("#clave","clave","","Debes Ingresar la clave"))
			return false;
		if(!revisa_campo("#clavex2","clavex2","","Debes Confirmar la clave"))
			return false;		
		if(document.form1.clavex2.value!=document.form1.clave.value)
		{
			 swal("ERROR!!!", "Deben coincidir ambas claves", "error");	
			 document.form1.clave.focus();		
			return false;
		}
	 }	
	if($("#tipo").val()<3) 
	 {
		if($("#seleccionadoscr").val()<1) 
		 {
			swal("ERROR!!!", "Debes Agregar al menos Un (1) Inmueble", "error");
			return false;
		 }		
	 }
	valida_u2();
}

function valida_actualiza_datos()
{
	if(!revisa_campo("#nombres","nombres","","Debes Ingresar los Nombres del usuario"))
		return false;
	if(!revisa_campo("#apellidos","apellidos","","Debes Ingresar los Apellidos del usuario"))
		return false;
	if(!revisa_campo("#ema","email","","Debes Ingresar el email"))
		return false;
	if(!emailCheck(document.form1.email.value))	
	  {		 
		swal("ERROR!!!", "Debes Ingresar un email valido", "error");				
		document.form1.email.focus();		
		return false;
	  }		
	if(document.form1.aceptox.checked ==true)
	 {
		if(!revisa_campo("#clave","clave","","Debes Ingresar la clave"))
			return false;
		if(!revisa_campo("#clavex2","clavex2","","Debes Confirmar la clave"))
			return false;		
		if(document.form1.clavex2.value!=document.form1.clave.value)
		{
			 swal("ERROR!!!", "Deben coincidir ambas claves", "error");	
			 document.form1.clave.focus();		
			return false;
		}
	 }		
	valida_u2();
}

function activalox(pw1,pw2,tres)
  {

   pa1=document.getElementById(pw1);
   pa2=document.getElementById(pw2);
   tercero=document.getElementById(tres);
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

   if(tercero.value==0)
   	tercero.value=1;
   else
   	tercero.value=0;	
  }
  
function calendario()
 {
	 $("#fec_nac").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
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

function suiche2(campo,campo_datos,state)
{
	$('input[name="'+campo+'"]').bootstrapSwitch('state',state);
	$('input[name="'+campo+'"]').on('switchChange.bootstrapSwitch', function(event, state) {
		activalox('clave','clavex2','aceptox');
});
}

function muestra_tabs()
{
    $('#myTab a').tab('show');
	$('#myTab a:first').tab('show');
}


function valida_tipoa()
{
		
	if(!revisa_campo("#descrip","descrip","","Debes Ingresar la descripción"))
		return false;
	document.form1.submit();		
}

function valida_tipoa2()
{
	
	if(!revisa_campo("#id_tipoi","id_tipoi","-1","Debes Seleccionar el Tipo de Incidencia"))
		return false;
	if(!revisa_campo("#descrip","descrip","","Debes Ingresar la descripción"))
		return false;	
	document.form1.submit();		
}


function carga_up3() //inmueble
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/index_inmuebles.php' : 'server/php/index_inmuebles.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload3').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		 maxFileSize: 9999000,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,
		limitMultiFileUploads:1,
		max_number_of_files:1,
        previewCrop: true
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            
			  busca_lasimgs1();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {            
			 busca_lasimgs1();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

function carga_up3lp() //inmueble
{
	var url = window.location.hostname === 'blueimp.github.io' ?
                'server/php/index_inmuebleslp.php' : 'server/php/index_inmuebleslp.php',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Procesando...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload3').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: true,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		 maxFileSize: 9999000,
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
	    imageCrop: false, // Force cropped images		
        previewMaxWidth: 120,
        previewMaxHeight: 100,
		limitMultiFileUploads:1,
		max_number_of_files:1,
        previewCrop: true
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            
			  busca_lasimgs1lp();
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {            
			 busca_lasimgs1lp();
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}

 
function valida_simplon()
{		
	if(!revisa_campo("#descrip","descrip","","Debes Ingresar la descripción"))
		return false;	
	document.form1.submit();		
}

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
	envia_rating_ajax();		
}

function subir_imga()
{
	if(!revisa_campo("#tituloimg","tituloimg","","Debes Ingresar la Descripción de la Imagen"))
		return false;	
	if(!revisa_campo("#archivo","archivo","","Debes seleccionar la foto"))
		return false;	
	subir_imga_ajax();		
}

function valida_faq()
{
	if(!revisa_campo("#pregunta","pregunta","","Debes Ingresar la pregunta"))
		return false;	
	if(!revisa_campo("#respuesta","respuesta","","Debes Ingresar la respuesta"))
		return false;	
	document.form1.submit();	
}

function valida_quotes()
{
	if(!revisa_campo("#titu_esp","titu_esp","","Debes Ingresar el Autor (Esp)"))
		return false;	
	if(!revisa_campo("#titu_eng","titu_eng","","Debes Ingresar el Autor (Eng)"))
		return false;
	if(!revisa_campo("#des_esp","des_esp","","Debes Ingresar el Texto (Esp)"))
		return false;	
	if(!revisa_campo("#des_eng","des_eng","","Debes Ingresar el Texto (Eng)"))
		return false;
	document.form1.submit();	
}

function valida_proys()
{
	if(!revisa_campo("#nombre","nombre","","Debes Ingresar el Nombre"))
		return false;	
	
	if(!revisa_campo("#video","video","","Debes Ingresar la Ruta del Video"))
		return false;
	if(!revisa_campo("#descrip","descrip","","Debes Ingresar la Descripción"))
		return false;
	if(!revisa_campo("#link","link","","Debes Ingresar el Link (Eng)"))
		return false;
	document.form1.submit();	
}

$(document).ready(function() { 
if( !(navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)))
	busca_notificaciones();
});