!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):t("object"==typeof exports?require("jquery"):jQuery)}(function(t){function s(s){var e=!1;return t('[data-notify="container"]').each(function(i,n){var a=t(n),o=a.find('[data-notify="title"]').text().trim(),r=a.find('[data-notify="message"]').html().trim(),l=o===t("<div>"+s.settings.content.title+"</div>").html().trim(),d=r===t("<div>"+s.settings.content.message+"</div>").html().trim(),g=a.hasClass("alert-"+s.settings.type);return l&&d&&g&&(e=!0),!e}),e}function e(e,n,a){var o={content:{message:"object"==typeof n?n.message:n,title:n.title?n.title:"",icon:n.icon?n.icon:"",url:n.url?n.url:"#",target:n.target?n.target:"-"}};a=t.extend(!0,{},o,a),this.settings=t.extend(!0,{},i,a),this._defaults=i,"-"===this.settings.content.target&&(this.settings.content.target=this.settings.url_target),this.animations={start:"webkitAnimationStart oanimationstart MSAnimationStart animationstart",end:"webkitAnimationEnd oanimationend MSAnimationEnd animationend"},"number"==typeof this.settings.offset&&(this.settings.offset={x:this.settings.offset,y:this.settings.offset}),(this.settings.allow_duplicates||!this.settings.allow_duplicates&&!s(this))&&this.init()}var i={element:"body",position:null,type:"info",allow_dismiss:!0,allow_duplicates:!0,newest_on_top:!1,showProgressbar:!1,placement:{from:"top",align:"right"},offset:20,spacing:10,z_index:1031,delay:5e3,timer:1e3,url_target:"_blank",mouse_over:null,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},onShow:null,onShown:null,onClose:null,onClosed:null,icon_type:"class",template:'<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">&times;</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'};String.format=function(){for(var t=arguments[0],s=1;s<arguments.length;s++)t=t.replace(RegExp("\\{"+(s-1)+"\\}","gm"),arguments[s]);return t},t.extend(e.prototype,{init:function(){var t=this;this.buildNotify(),this.settings.content.icon&&this.setIcon(),"#"!=this.settings.content.url&&this.styleURL(),this.styleDismiss(),this.placement(),this.bind(),this.notify={$ele:this.$ele,update:function(s,e){var i={};"string"==typeof s?i[s]=e:i=s;for(var n in i)switch(n){case"type":this.$ele.removeClass("alert-"+t.settings.type),this.$ele.find('[data-notify="progressbar"] > .progress-bar').removeClass("progress-bar-"+t.settings.type),t.settings.type=i[n],this.$ele.addClass("alert-"+i[n]).find('[data-notify="progressbar"] > .progress-bar').addClass("progress-bar-"+i[n]);break;case"icon":var a=this.$ele.find('[data-notify="icon"]');"class"===t.settings.icon_type.toLowerCase()?a.removeClass(t.settings.content.icon).addClass(i[n]):(a.is("img")||a.find("img"),a.attr("src",i[n]));break;case"progress":var o=t.settings.delay-t.settings.delay*(i[n]/100);this.$ele.data("notify-delay",o),this.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow",i[n]).css("width",i[n]+"%");break;case"url":this.$ele.find('[data-notify="url"]').attr("href",i[n]);break;case"target":this.$ele.find('[data-notify="url"]').attr("target",i[n]);break;default:this.$ele.find('[data-notify="'+n+'"]').html(i[n])}var r=this.$ele.outerHeight()+parseInt(t.settings.spacing)+parseInt(t.settings.offset.y);t.reposition(r)},close:function(){t.close()}}},buildNotify:function(){var s=this.settings.content;this.$ele=t(String.format(this.settings.template,this.settings.type,s.title,s.message,s.url,s.target)),this.$ele.attr("data-notify-position",this.settings.placement.from+"-"+this.settings.placement.align),this.settings.allow_dismiss||this.$ele.find('[data-notify="dismiss"]').css("display","none"),(this.settings.delay<=0&&!this.settings.showProgressbar||!this.settings.showProgressbar)&&this.$ele.find('[data-notify="progressbar"]').remove()},setIcon:function(){"class"===this.settings.icon_type.toLowerCase()?this.$ele.find('[data-notify="icon"]').addClass(this.settings.content.icon):this.$ele.find('[data-notify="icon"]').is("img")?this.$ele.find('[data-notify="icon"]').attr("src",this.settings.content.icon):this.$ele.find('[data-notify="icon"]').append('<img src="'+this.settings.content.icon+'" alt="Notify Icon" />')},styleDismiss:function(){this.$ele.find('[data-notify="dismiss"]').css({position:"absolute",right:"10px",top:"5px",zIndex:this.settings.z_index+2})},styleURL:function(){this.$ele.find('[data-notify="url"]').css({backgroundImage:"url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7)",height:"100%",left:0,position:"absolute",top:0,width:"100%",zIndex:this.settings.z_index+1})},placement:function(){var s=this,e=this.settings.offset.y,i={display:"inline-block",margin:"0px auto",position:this.settings.position?this.settings.position:"body"===this.settings.element?"fixed":"absolute",transition:"all .5s ease-in-out",zIndex:this.settings.z_index},n=!1,a=this.settings;switch(t('[data-notify-position="'+this.settings.placement.from+"-"+this.settings.placement.align+'"]:not([data-closing="true"])').each(function(){e=Math.max(e,parseInt(t(this).css(a.placement.from))+parseInt(t(this).outerHeight())+parseInt(a.spacing))}),this.settings.newest_on_top===!0&&(e=this.settings.offset.y),i[this.settings.placement.from]=e+"px",this.settings.placement.align){case"left":case"right":i[this.settings.placement.align]=this.settings.offset.x+"px";break;case"center":i.left=0,i.right=0}this.$ele.css(i).addClass(this.settings.animate.enter),t.each(Array("webkit-","moz-","o-","ms-",""),function(t,e){s.$ele[0].style[e+"AnimationIterationCount"]=1}),t(this.settings.element).append(this.$ele),this.settings.newest_on_top===!0&&(e=parseInt(e)+parseInt(this.settings.spacing)+this.$ele.outerHeight(),this.reposition(e)),t.isFunction(s.settings.onShow)&&s.settings.onShow.call(this.$ele),this.$ele.one(this.animations.start,function(){n=!0}).one(this.animations.end,function(){s.$ele.removeClass(s.settings.animate.enter),t.isFunction(s.settings.onShown)&&s.settings.onShown.call(this)}),setTimeout(function(){n||t.isFunction(s.settings.onShown)&&s.settings.onShown.call(this)},600)},bind:function(){var s=this;if(this.$ele.find('[data-notify="dismiss"]').on("click",function(){s.close()}),this.$ele.mouseover(function(){t(this).data("data-hover","true")}).mouseout(function(){t(this).data("data-hover","false")}),this.$ele.data("data-hover","false"),this.settings.delay>0){s.$ele.data("notify-delay",s.settings.delay);var e=setInterval(function(){var t=parseInt(s.$ele.data("notify-delay"))-s.settings.timer;if("false"===s.$ele.data("data-hover")&&"pause"===s.settings.mouse_over||"pause"!=s.settings.mouse_over){var i=(s.settings.delay-t)/s.settings.delay*100;s.$ele.data("notify-delay",t),s.$ele.find('[data-notify="progressbar"] > div').attr("aria-valuenow",i).css("width",i+"%")}t<=-s.settings.timer&&(clearInterval(e),s.close())},s.settings.timer)}},close:function(){var s=this,e=parseInt(this.$ele.css(this.settings.placement.from)),i=!1;this.$ele.attr("data-closing","true").addClass(this.settings.animate.exit),s.reposition(e),t.isFunction(s.settings.onClose)&&s.settings.onClose.call(this.$ele),this.$ele.one(this.animations.start,function(){i=!0}).one(this.animations.end,function(){t(this).remove(),t.isFunction(s.settings.onClosed)&&s.settings.onClosed.call(this)}),setTimeout(function(){i||(s.$ele.remove(),s.settings.onClosed&&s.settings.onClosed(s.$ele))},600)},reposition:function(s){var e=this,i='[data-notify-position="'+this.settings.placement.from+"-"+this.settings.placement.align+'"]:not([data-closing="true"])',n=this.$ele.nextAll(i);this.settings.newest_on_top===!0&&(n=this.$ele.prevAll(i)),n.each(function(){t(this).css(e.settings.placement.from,s),s=parseInt(s)+parseInt(e.settings.spacing)+t(this).outerHeight()})}}),t.notify=function(t,s){var i=new e(this,t,s);return i.notify},t.notifyDefaults=function(s){return i=t.extend(!0,{},i,s)},t.notifyClose=function(s){"warning"===s&&(s="danger"),"undefined"==typeof s||"all"===s?t("[data-notify]").find('[data-notify="dismiss"]').trigger("click"):"success"===s||"info"===s||"warning"===s||"danger"===s?t(".alert-"+s+"[data-notify]").find('[data-notify="dismiss"]').trigger("click"):s?t(s+"[data-notify]").find('[data-notify="dismiss"]').trigger("click"):t('[data-notify-position="'+s+'"]').find('[data-notify="dismiss"]').trigger("click")},t.notifyCloseExcept=function(s){"warning"===s&&(s="danger"),"success"===s||"info"===s||"warning"===s||"danger"===s?t("[data-notify]").not(".alert-"+s).find('[data-notify="dismiss"]').trigger("click"):t("[data-notify]").not(s).find('[data-notify="dismiss"]').trigger("click")}});

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
   
function ajuste(){
	$('#latablitax tfoot th').each( function () {
        var title = $(this).text();
		if(title!="Acciones")
	        $(this).html( '<input type="text" placeholder="Buscar '+title+'" class="inputdt"/>' );
		else	
			$(this).html('');
    } );
	
   $.urlParam = function(name){
	var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);	
	if (!results)
	{
	return "";
	}
	return results[1] || "";
	}	
	
   var table =$('#latablitax').DataTable( {	
		"bDeferRender": true,	
		"sPaginationType": "full_numbers",		
		dom: 'frtip',
		"bVisible":false,
		"order": [[ 0, "desc" ]],
		responsive: true,		
		"oSearch": {"sSearch": $.urlParam('search')},
		 buttons: [
			{ extend: 'excelHtml5', text: 'Guardar Excel',className:'au-btn au-btn-load' },
			{
				extend: 'print',
				text: 'Imprimir',
				className:'au-btn au-btn-load',
				exportOptions: {
					modifier: {
						 columns: ':visible'
					}
				},customize: function (win) {
                $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                    $(this).css('background-color','#D0D0D0');
                });
                $(win.document.body).find('h1').css('text-align','center');
           	 }
			}
		],
		"ajax": {
			"url": "utiles/pagina_eomv.php",
        	"type": "POST"
		},							
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">Todos</option>'+
		        '</select> registros',    
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar ",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por favor espere - cargando...",
		    "oPaginate": {
		        "sFirst":    "<<",
		        "sLast":     ">>",
		        "sNext":     ">",
		        "sPrevious": "<"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        },
	   initComplete: function () {
			
			$('.buttons-excel').html('Exportar a Excel')
			$('.dt-buttons').css("float","right");
		}
	});  
			
	table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );	

   }

function valida_u() {
   var ax = new objetoAjax();
   ax.open("POST", "valida_ali.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
         if(ax.responseText == 0) {
			document.form1.submit();
		 }
         else
		  {
		   swal("ERROR!!!", "Ya existe un usuario con ese Email. Ingrese otro", "error");	  		   
		   document.form1.email.focus();
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("u=" + document.form1.email.value);
   }
 
function valida_u2() {
   var ax = new objetoAjax();
   ax.open("POST", "valida_ali2.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
         if(ax.responseText == 0) {
			document.form1.submit();
		 }
         else
		  {
		   swal("ERROR!!!", "Ya existe un usuario con ese Email. Ingrese otro", "error");	  		   
		   document.form1.email.focus();
		   return false;
		  } 
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("u=" + document.form1.email.value+"&id="+document.form1.id_usuarios.value);
   }
 
function busca_lasimgs1()
{
   var divFormulario = document.getElementById('tab_2');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_img1.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_up3();		
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function busca_lasimgs1lp()
{
   var divFormulario = document.getElementById('tab_2');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_img1lp.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_up3lp();		
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function eliminar_imgs_2(id,cual) {	
	swal({
	  title: "Seguro de eliminar la imagen?",
	  text: "No se podrá recuperar esta imagen posteriormente!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, Eliminarlo!",
	  closeOnConfirm: false
	},
	function(){
		 var ajax = objetoAjax();
	   ajax.open("POST", "eliminar_imgs_2.php");
	   ajax.onreadystatechange = function() 
	    {		
		  if (ajax.readyState == 4)
		   {
			   busca_lasimgsch2();
			 swal("Eliminado!", "La imagen fue Eliminada.", "success");  
			 
		   }
		 }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id="+id+"&cual="+cual)
	  
	});
	
 }    
 
function eliminar_imgs_inmuebles(id,cual) {	
	swal({
	  title: "Seguro de eliminar la imagen?",
	  text: "No se podrá recuperar esta imagen posteriormente!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, Eliminarlo!",
	  closeOnConfirm: false
	},
	function(){
		 var ajax = objetoAjax();
	   ajax.open("POST", "eliminar_imgs_inmuebles.php");
	   ajax.onreadystatechange = function() 
	    {		
		  if (ajax.readyState == 4)
		   {
			   busca_lasimgs1();
			 swal("Eliminado!", "La imagen fue Eliminada.", "success");  
			 
		   }
		 }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id="+id+"&cual="+cual)
	  
	});
	
 }   
 
function eliminar_imgs_inmuebleslp(id,cual) {	
	swal({
	  title: "Seguro de eliminar la imagen?",
	  text: "No se podrá recuperar esta imagen posteriormente!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, Eliminarlo!",
	  closeOnConfirm: false
	},
	function(){
		 var ajax = objetoAjax();
	   ajax.open("POST", "eliminar_imgs_inmuebleslp.php");
	   ajax.onreadystatechange = function() 
	    {		
		  if (ajax.readyState == 4)
		   {
			   busca_lasimgs1lp();
			 swal("Eliminado!", "La imagen fue Eliminada.", "success");  
			 
		   }
		 }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id="+id+"&cual="+cual)
	  
	});
	
 }

function eliminar_imgs_carrusel(id_img) {
	if(confirm("Seguro de eliminar la imagen?"))
	{
	   var ajax = objetoAjax();
	   ajax.open("POST", "elim_img2.php");
	   ajax.onreadystatechange = function() {		
		  if (ajax.readyState == 4) {
			 busca_lasimgs2();
			  }
		  }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id_img=" + id_img)
	}
   }    
   
function carga_imgs2() {
   var divFormulario = document.getElementById('lasim2');
   ajax = objetoAjax();
   ajax.open("POST", "carga_imgs2.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {
         divFormulario.innerHTML = ajax.responseText
		 zoomi();
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
   }    
     

function cargue_inmuebles(lapagina)
{
	main_string="nom_inm="+$("#nom_inm").val()+"&desde="+$("#desde").val()+"&hasta="+$("#hasta").val()+"&orden_gral="+$("#orden_gral").val()+"&lapagina="+lapagina;
					$.ajax({
						type: "POST",
						url: "cargue_inmuebles.php",
						data: main_string, 
						cache: false,
						success: function(html){				
							$("#listadospropiedades").html(html);						
						}
						});
}

function cargue_incidencias(lapagina)
{
	main_string="id_inmu_uno_b="+$("#id_inmu_uno_b").val()+"&desde="+$("#desde").val()+"&hasta="+$("#hasta").val()+"&un_orden_diferente="+$("#un_orden_diferente").val()+"&id_tipoi="+$("#id_tipoi").val()+"&involucrado="+$("#involucrado").val()+"&aptoinv="+$("#aptoinv").val()+"&cualorden="+$("#cualorden").val()+"&lapagina="+lapagina;
					$.ajax({
						type: "POST",
						url: "cargue_incidencias.php",
						data: main_string, 
						cache: false,
						success: function(html){		
							$("#petunia").html(html);										
						}
						});
}

function busca_motivos()
{
	if($("#id_tipoi").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "busca_motivos.php",
						data: "cual="+$("#id_tipoi").val(), 
						cache: false,
						success: function(html){				
							$("#motide").html(html);						
						}
						});
	 }
	else
		$("#motide").html("");	 
}

function busca_aptos()
{
	if($("#id_inmueble").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "busca_aptos.php",
						data: "cual="+$("#id_inmueble").val(), 
						cache: false,
						success: function(html){				
							$("#laptos").html(html);						
						}
						});
	 }
	else
		$("#laptos").html("");	 
}

function busca_aptos2()
{
	if($("#id_inmuebles").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "busca_aptos2.php",
						data: "cual="+$("#id_inmuebles").val(), 
						cache: false,
						success: function(html){				
							$("#laptos").html(html);						
						}
						});
	 }
	else
		$("#laptos").html("");	 
}

function busca_aptos3()
{
	if($("#id_inmueble").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "busca_aptos3.php",
						data: "cual="+$("#id_inmueble").val(), 
						cache: false,
						success: function(html){				
							$("#laptos").html(html);						
						}
						});
	 }
	else
		$("#laptos").html("");	 
}

function busca_aptos4()
{
	if($("#id_inmuebles").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "busca_aptos4.php",
						data: "cual="+$("#id_inmuebles").val(), 
						cache: false,
						success: function(html){				
							$("#laptos").html(html);						
						}
						});
	 }
	else
		$("#laptos").html("");	 
}

function busca_lasimgs_dejacomentario()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_lasimgs_dejacomentario.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_dejacomentario();	
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 


function busca_lasimgsch()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_imgch.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_upc();	
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function busca_lasimgsch_ifv()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_ifv.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_imgfondvideo();	
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function busca_lasimgsch_about()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_imabt.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText
			carga_imgabout();	
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function busca_lasimgsch2()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_imgch2.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
		    carga_upc2();
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function busca_txt_imgch_audio()
{
   var divFormulario = document.getElementById('tab_5');
   ajax = objetoAjax();
   ajax.open("POST", "busca_txt_imgch_audio.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/fancybox_loading.gif"></div>';
         }
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
		    carga_upc2a();
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function eliminar_imgs_a(id,cual) {	
	swal({
	  title: "Seguro de eliminar el audio?",
	  text: "No se podrá recuperar este audio posteriormente!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, Eliminarlo!",
	  closeOnConfirm: false
	},
	function(){
		 var ajax = objetoAjax();
	   ajax.open("POST", "eliminar_imgs_a.php");
	   ajax.onreadystatechange = function() 
	    {		
		  if (ajax.readyState == 4)
		   {
			   busca_txt_imgch_audio();
			 swal("Eliminado!", "Audio fue Eliminado.", "success");  
			 
		   }
		 }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id="+id+"&cual="+cual)
	  
	});
	
 } 

function modifi_inci(inci)
{
   var divFormulario = document.getElementById('responder');
   ajax = objetoAjax();
   ajax.open("POST", "sub_plantillas/subp_incidenciam.php");
   ajax.onreadystatechange = function() {      
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("inci="+inci)
} 

function actualiza_estatus_inci()
{
   var divFormulario = document.getElementById('responder');
   ajax = objetoAjax();
   ajax.open("POST", "actualiza_estatus_inci.php");
   ajax.onreadystatechange = function() {      
      if (ajax.readyState == 4) {		 
         	window.location.href ="incidencias_consultar.php?id="+document.getElementById('id_incidencia').value;
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("id_incidencia="+document.getElementById('id_incidencia').value+"&estatus="+document.getElementById('estatus').value)
} 

function responder_inci(padre,id_incidencia)
{
   var divFormulario = document.getElementById('responder');
   ajax = objetoAjax();
   ajax.open("POST", "responder_inci.php");
   ajax.onreadystatechange = function() {      
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
			/*var scrollPos =  $(".formulariox").offset().top;
 			$(window).scrollTop(scrollPos);*/
			busca_lasimgs_dejacomentario();
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("padre="+padre+"&id_incidencia="+id_incidencia)
} 

function editar_comentarios(id_comen,id_inci)
{
   var divFormulario = document.getElementById('responder');
   ajax = objetoAjax();
   ajax.open("POST", "editar_comentarios.php");
   ajax.onreadystatechange = function() {      
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
			var scrollPos =  $(".formulariox").offset().top;
 			$(window).scrollTop(scrollPos);
			busca_lasimgs_dejacomentario();
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("id_comen="+id_comen+"&id_incidencia="+id_inci)
} 

function eliminar_comentario(id_comen,id_inci)
{
   swal({
	  title: "Seguro de eliminar el Comentario?",
	  text: "No se podrá recuperar este Comentario posteriormente!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Si, Eliminarlo!",
	  closeOnConfirm: false
	},
	function(){
		 var ajax = objetoAjax();
	   ajax.open("POST", "eliminar_comentario.php");
	   ajax.onreadystatechange = function() 
	    {		
		  if (ajax.readyState == 4)
		   {
			 traecomentariosx(id_inci,0);	  
			 swal("Eliminado!", "Comentario fue Eliminado.", "success");  			
		   }
		 }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	  ajax.send("id_comen="+id_comen)
	  
	});	
} 
function guarda_comen(inci)
{
	var form = $('#respondercomen');

	$.ajax({
						type: "POST",
						url: "guarda_comen.php",
						data: form.serialize(),
						cache: false,
						success: function(html){				
							$("#responder").html(html);	
							traecomentariosx(inci,0);					
						}
						});
}
function guarda_comen33(inci)
{

	var form = $('#respondercomen');
	$.ajax({
						type: "POST",
						url: "guarda_comen33.php",
						data: form.serialize(),
						cache: false,
						success: function(html){				
							$("#responder").html(html);	
							traecomentariosx(inci,0);					
						}
						});
}
function guarda_comen2(cual,inci)
{
	var form = $('#respondercomen2');
	$.ajax({
						type: "POST",
						url: "guarda_comen2.php",
//						data: "id_res_comen=0&id_comen="+cual+"&comen="+descrip, 
						data: form.serialize(),
						cache: false,
						success: function(html){				
							$("#respcom_"+cual).html(html);	
							traecomentariosx(inci,0);					
						}
						});
}

function cerrar_comen()
{
	document.getElementById('responder').innerHTML="";
}

function cerrar_comen2(inci)
{
	traecomentariosx(inci,0);
}

function traecomentariosx(inci,anexo)
{
	$.ajax({
						type: "POST",
						url: "comentariosx.php",
						data: "id_incidencia="+inci, 
						cache: false,
						success: function(html){				
							$("#comentariosx").html(html);	
							if(anexo>0)
								responder_comen(anexo,inci);							
						}
						});
}

function responder_comen(cuals,inci)
{
   var divFormulario = document.getElementById('respcom_'+cuals);
   ajax = objetoAjax();
   ajax.open("POST", "responder_comen.php");
   ajax.onreadystatechange = function() { 
   if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }     
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
			var scrollPos =  $(".formulariox").offset().top;
 			$(window).scrollTop(scrollPos);
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("cual="+cuals+"&inci="+inci)
} 

function envia_rating_ajax()
 {	 	 	 
   var divFormulario = document.getElementById('editarincidencia');  
   var form=$("#resre");
   $.ajax({
        type:"POST",
        url:"envia_rating_ajax.php",
        data:form.serialize(),
        success: function(response){
        if(response == 1){
           divFormulario.innerHTML = '<h3 align="center">Reporte Actualizado Exitosamente!!!</h3><br><div class="card-footer"><a class="btn btn-primary" href="index.php">Continuar</a></div>';
        }  else {
           swal("ERROR!!!", atxt32, "error");
				$("#em").addClass("has-error");	
				return false;
        }
        }
    });   
 } 
 
function editar_notifica()
{
	 var divFormulario = document.getElementById('editanotifica');  
   var ajax = objetoAjax();
   ajax.open("POST", "editar_notifica.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {				
         	divFormulario.innerHTML = ajax.responseText;		
	    }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function guardar_notifica()
{
   if(!revisa_campo("#texto","texto","","Debes Ingresar el Texto del Mensaje"))
		return false;
   var divFormulario = document.getElementById('editanotifica');
   var ajax = objetoAjax();
   ajax.open("POST", "guardar_notifica.php");
   ajax.onreadystatechange = function() {
      if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }
      if (ajax.readyState == 4) {
		
		  if(ajax.responseText == 1) 
		   {	
         	window.location.href ="principal.php";
		   }
		  else
		   {
			   swal("ERROR!!!", "No se pudo actualizar, Intente Nuevamente!!!", "error");
				return false;
		   } 
	    }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send("id_noti=1&texto="+document.getElementById("texto").value)
} 

function agregar_conjres()
{
	 var divFormulario = document.getElementById('conresagreg');
   ajax = objetoAjax();
   ajax.open("POST", "trae_inmuebles3.php");
   ajax.onreadystatechange = function() { 
   if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }     
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
} 

function agrega_vector_ajax()
{
   if(!revisa_campo("#id_inmuebles","id_inmuebles","-1","Debes Seleccionar el Inmueble"))
		return false;	
   if(!revisa_campo("#id_apto","id_apto","-1","Debes Seleccionar el Apartamento"))
		return false;	
   if(!revisa_campo("#fec_garantia","fec_garantia","","Debes Seleccionar la Fecha de Garantía"))
		return false;
	if(!revisa_campo("#fec_ingreso","fec_ingreso","","Debes Seleccionar la Fecha de Ingreso"))
		return false;		
	var ax = new objetoAjax();
	var	 selectOrigen=document.getElementById("id_inmuebles");
	var	 selectOrigen2=document.getElementById("id_apto");
   ax.open("POST", "agrega_cr_vector.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  	  		
			swal("Genial!!!", "Conjunto Residencial Agregado Correctamente!", "success");
			cuenta_vector();		   
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("id_detalle=0&id_usuarios="+document.getElementById("id_usuarios").value +"&id_inmuebles=" +  selectOrigen.options[selectOrigen.selectedIndex].value+"&id_apto=" +  selectOrigen2.options[selectOrigen2.selectedIndex].value+"&fec_garantia="+document.getElementById("fec_garantia").value+"&fec_ingreso="+document.getElementById("fec_ingreso").value);
} 

function eliminar_vector(cual)
 {
	 
	  var ax = new objetoAjax();
   ax.open("POST", "eliminar_matriz_cr.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  swal("Genial!!!", "Conjunto Residencial Eliminado Correctamente!", "success");
		  cuenta_vector();	
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send("position="+cual);
	 
 }
 
function cuenta_vector()
{
   var ax = new objetoAjax();
   ax.open("POST", "cuenta_vector.php");
   ax.onreadystatechange = function() {
      if (ax.readyState == 4) {	  
		  $("#seleccionadoscr").val(ax.responseText);		
		  buscar_vector();   	   		  
         }
      }
   ax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ax.send(null);
}  

function buscar_vector()
{
   var divFormulario = document.getElementById('conresagreg');
   ajax = objetoAjax();
   ajax.open("POST", "busca_vector.php");
   ajax.onreadystatechange = function() { 
   if (ajax.readyState == 1) {
         divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
         }     
      if (ajax.readyState == 4) {		 
         	divFormulario.innerHTML = ajax.responseText;
		  }
      }
   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   ajax.send(null)
}

function traedueno()
{
  if($("#id_incidencia").val()>0)
	 {
			$.ajax({
						type: "POST",
						url: "traedueno.php",
						data: "cual="+$("#id_incidencia").val(), 
						cache: false,
						success: function(html){				
							$("#detoscliente").html(html);						
						}
						});
	 }
	else
		$("#detoscliente").html("");	 
}

function busca_reportes()
{
	 if($("#aptos").val()>0)
	 {
			
	   var divFormulario = document.getElementById('editanotifica');
	   var ajax = objetoAjax();
	   ajax.open("POST", "busca_reportes.php");
	   ajax.onreadystatechange = function() {
		  if (ajax.readyState == 1) {
			 divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
			 }
		  if (ajax.readyState == 4) {

			  if(ajax.responseText >0) 
			   {	
				 swal("ERROR!!!", "Este apartamento tiene activo un reporte", "error");
				 swal({
					  title: "Reporte ya Creado",
					  text: "Este apartamento tiene un Reporte Ya Creado o en Proceso",
					  type: "error",
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "Ir al Reporte!",
					  CancelButtonText: "Cancelar",
					  closeOnConfirm: false
					},
					function(siloconfirma){
						if(siloconfirma)
							window.location.href = "detalle-incidencia.php?id="+ajax.responseText;
					  	else
							window.location.href = "principal.php";
					});	
			   }
			  else
			  	document.formi.submit();
			}
		  }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id_inmueble="+$("#id_inmueble").val()+"&aptos="+$("#aptos").val())					
	 }
}

function busca_reportes3()
{
	 if($("#aptos").val()>0)
	 {
			
	   var divFormulario = document.getElementById('editanotifica');
	   var ajax = objetoAjax();
	   ajax.open("POST", "busca_reportes.php");
	   ajax.onreadystatechange = function() {
		  if (ajax.readyState == 1) {
			 divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
			 }
		  if (ajax.readyState == 4) {

			  if(ajax.responseText >0) 
			   {	
				 swal("ERROR!!!", "Este apartamento tiene activo un reporte", "error");
				 swal({
					  title: "Reporte ya Creado",
					  text: "Este apartamento tiene un Reporte Ya Creado o en Proceso",
					  type: "error",
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "Ir al Reporte!",
					  CancelButtonText: "Cancelar",
					  closeOnConfirm: false
					},
					function(siloconfirma){
						if(siloconfirma)
							window.location.href = "detalle-incidencia.php?id="+ajax.responseText;
					  	else
							window.location.href = "principal.php";
					});	
			   }			 
			}
		  }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id_inmueble="+$("#id_inmueble").val()+"&aptos="+$("#aptos").val())					
	 }
}

function busca_reportes2()
{
	 if($("#aptos").val()>0)
	 {
			
	   var divFormulario = document.getElementById('editanotifica');
	   var ajax = objetoAjax();
	   ajax.open("POST", "busca_reportes2.php");
	   ajax.onreadystatechange = function() {
		  if (ajax.readyState == 1) {
			 divFormulario.innerHTML = '<div align="center"><img src="img/cargando.gif"></div>';
			 }
		  if (ajax.readyState == 4) {
			
			  if(ajax.responseText >0) 
			   {	
				 swal("ERROR!!!", "Este apartamento tiene activo un reporte", "error");
				 swal({
					  title: "Reporte ya Creado",
					  text: "Este apartamento tiene un Reporte Ya Creado o en Proceso",
					  type: "error",
					  showCancelButton: true,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "Ir al Reporte!",
					  CancelButtonText: "Cancelar",
					  closeOnConfirm: false
					},
					function(siloconfirma){
						if(siloconfirma)
							window.location.href = "detalle-incidencia.php?id="+ajax.responseText;
					  	else
							window.location.href = "principal.php";
					});	
			   }
			  else
			  	document.formi.submit(); 
			}
		  }
	   ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	   ajax.send("id_inmueble="+$("#id_inmueble").val()+"&aptos="+$("#aptos").val()+"&id_incidencia="+$("#id_incidencia").val())					
	 }
}

function subir_imga_ajax()
 {	 	 	 
    var form=$("#formc");
	var formElement = document.querySelectorAll("form");
	var formData = new FormData(formElement[1]);
	if (window.File && window.FileReader && window.FileList && window.Blob)
    {
       
        var fsize = $('#archivo')[0].files[0].size;
      
			$.ajax({
				type:"POST",
				url:"subir_imga_ajax.php",
				data:formData,
				processData: false, 
				contentType: false,
				beforeSend: function () {
                         $("#forsubir").html("Procesando, espere por favor...");
                },
				success: function(response){
				if(response == 1){
				   $("#forsubir").html('<form name="formc" id="formc" method="post" enctype="multipart/form-data"><div class="form-group"><label for="nombre" class="control-label mb-1">Descripción de la Imagen</label><input class="form-control" name="tituloimg" id="tituloimg" type="text"></div><div class="form-group"><label for="nombre" class="control-label mb-1">Descripción de la Imagen</label><input class="form-control-file" name="archivo" id="archivo" type="file" accept="image/*;capture=camera"></div></form><div align="center"> <a class="btn btn-primary" type="button" onclick="subir_imga()" style="text-decoration:none;color:white">Subir</a></div>');
				   busca_lasimgsch2();
				   swal("Genial!!!", "Imagen Cargada Correctamente!", "success");
				}  else {
				   swal("ERROR!!!", "Imagen no Cargada. Intente Nuevamente", "error");
					return false;
				}
				}
			});
      
    }else{
		swal("ERROR!!!", "Actualice su navegador, ya que su navegador actual ¡carece de algunas funciones nuevas que necesitamos!", "error");
    }
      
 } 
 
var myVar;

function busca_notificaciones() {
    myVar = setTimeout(busca_notificaciones_ajax, 3000);
}

function busca_notificaciones_ajax() {
	$.ajax({
		type: "POST",
		url: "busca_notificaciones_ajax.php",
		cache: false,
		success: function(html){	
		if(html.substring(0, 1)=="1")			
		 {
			$.notify(html.substring(1, html.length), {
				newest_on_top: true
			});			
		 }
		}
	});
}