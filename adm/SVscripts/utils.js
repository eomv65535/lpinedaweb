$(document).ready(function() { 

$("#centro table th.bajando").click(function()

{

$(this).toggleClass("subiendo");

$(this).siblings().removeClass("subiendo");

/*
1=> Tipo Reporte asc
2=> Tipo Reporte desc
3=> Motivo Reporte asc
4=> Motivo Reporte desc
5=>	Descripción asc
6=> Descripción desc
7=> Comentarios Admin. asc
8=> Comentarios Admin. desc
9=> fecha asc
10=> fecha desc
11=> Estatus asc
12=> Estatus desc
*/

if($(this).attr('id')=="orde_tip")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("1");
	else	
		$("#un_orden_diferente").val("2");
 }

if($(this).attr('id')=="orde_mr")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("3");
	else	
		$("#un_orden_diferente").val("4");
 }

if($(this).attr('id')=="orde_des")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("5");
	else	
		$("#un_orden_diferente").val("6");
 }

if($(this).attr('id')=="orde_ca")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("7");
	else	
		$("#un_orden_diferente").val("8");
 }  
if($(this).attr('id')=="orde_fec")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("9");
	else	
		$("#un_orden_diferente").val("10");
 }
if($(this).attr('id')=="orde_tat")
 {
	if($(this).attr('class')=='bajando subiendo')
		$("#un_orden_diferente").val("11");
	else	
		$("#un_orden_diferente").val("12");
 }  
 cargue_incidencias(1);
});







$("#optiondenuncia").click(function(){

  	$("#motivodenuncia").show(800);

});

$(".otraincidencia").click(function(){

  	$("#motivodenuncia").hide(800);

});





// papa hijo

	var mostar_directorio = function()

{

  index=$(this).index('.papa');

  $('.hijo').eq(index).toggle(300); 

}



$(".papa").click(mostar_directorio);

	

	

$(".papa").click(function(){

 $('html, body').animate({scrollTop: $(this).offset().top -90}, 500);

	$(this).toggleClass("activo",300 );

		$(this).parent().toggleClass("abierto",300 );

	});	





});

/// termino el jquery

								



 WebFontConfig = {

    google: { families: [ 'Open+Sans:400,300,350,700,600:latin' ] }

  };

  (function() {

    var wf = document.createElement('script');

    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +

      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';

    wf.type = 'text/javascript';

    wf.async = 'true';

    var s = document.getElementsByTagName('script')[0];

    s.parentNode.insertBefore(wf, s);

  })(); 

function MM_findObj(n, d) { //v4.01

  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {

    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}

  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];

  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);

  if(!x && d.getElementById) x=d.getElementById(n); return x;

}

function MM_swapImgRestore() { //v3.0

  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;

}

function MM_swapImage() { //v3.0

  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)

   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}

}

 

	

	function popup(mylink, windowname,alto1,largo1)

	 {

	var alto = alto1;

	var largo = largo1;

	var winleft = (screen.width - largo) / 2;

	var winUp = (screen.height - alto) / 2;

//	if (! window.focus){ return true;}

	  var href;

	  if(typeof(mylink) == 'string')

		href=mylink;

	  else

		href=mylink.href;

		x=window.open(href, windowname, 'top='+winUp+',left='+winleft+'+,toolbar=0 status=0,resizable=0,Width='+largo+',height='+alto+',scrollbars=1');

	    x.focus();

	}

 function selectAll(selectBox,selectAll) { 

    // have we been passed an ID 

    if (typeof selectBox == "string") { 

        selectBox = document.getElementById(selectBox);

    } 

    // is the select box a multiple select box? 

    if (selectBox.type == "select-multiple") { 

        for (var i = 0; i < selectBox.options.length; i++) { 

             selectBox.options[i].selected = selectAll; 

        } 

    }

	

 };