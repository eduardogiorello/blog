
/*=============================================
BANNER
=============================================*/

$(".fade-slider").jdSlider({

	isSliding: false,
	isAuto: true,
	isLoop: true,
	isDrag: false,
	interval:5000,
	isCursor: false,
	speed:3000

});

var alturaBanner = $(".fade-slider").height();

$(".bannerEstatico").css({"height":alturaBanner+"px"})


/*=============================================
ANIMACIONES SCROLL
=============================================*/

$(window).scroll(function(){

	var posY = window.pageYOffset;
	
	if(posY > alturaBanner){

		$("header").css({"background":"white"})

		$("header .logotipo").css({"filter":"invert(100%)"})

		$(".fa-search, .fa-bars").css({"color":"black"})

	}else{

		$("header").css({"background":"rgba(0,0,0,.5)"})

		$("header .logotipo").css({"filter":"invert(0%)"})

		$(".fa-search, .fa-bars").css({"color":"white"})

	}

})

/*=============================================
MENÚ
=============================================*/

$(".fa-bars").click(function(){

	$(".menu").fadeIn("fast");

})

$(".btnClose").click(function(e){

	e.preventDefault();

	$(".menu").fadeOut("fast");

})

/*=============================================
GRID CATEGORÍAS
=============================================*/

$(".grid figure, .gridFooter figure").mouseover(function(){

	$(this).css({"background-position":"right bottom"})

})

$(".grid figure, .gridFooter figure").mouseout(function(){

	$(this).css({"background-position":"left top"})

})

$(".grid figure, .gridFooter figure").click(function(){

	var vinculo = $(this).attr("vinculo");

	window.location = vinculo;

})

/*=============================================
PAGINACIÓN
=============================================*/

var totalPaginas = Number($(".pagination").attr("totalPaginas"));
var paginaActual = Number($(".pagination").attr("paginaActual"));
var rutaActual = $("#rutaActual").val();
var rutaPagina = $(".pagination").attr("rutaPagina");

if($(".pagination").length != 0){

	$(".pagination").twbsPagination({
		totalPages: totalPaginas,
		startPage: paginaActual,
		visiblePages: 4,
		first: "Primero",
		last: "Último",
		prev: '<i class="fas fa-angle-left"></i>',
		next: '<i class="fas fa-angle-right"></i>'

	}).on("page", function(evt, page){

		if(rutaPagina != ""){

			window.location = rutaActual+rutaPagina+"/"+page;

		}else{

			window.location = rutaActual+page;
		}
		

	})

}


/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
})

/*=============================================
DESLIZADOR DE ARTÍCULOS
=============================================*/


$(".deslizadorArticulos").jdSlider({
	wrap: ".slide-inner",
	slideShow: 3,
	slideToScroll:3,
	isLoop: true,
	responsive: [{
		viewSize: 320,
		settings:{
			slideShow: 1,
			slideToScroll: 1
		}

	}]

})
/*=============================================
Ver si opiniones esta vacio
=============================================*/

if (document.querySelector(".opiniones").childNodes.length == 1) {
	$(".opiniones").html(`
      <p class="pl-3 text-secondary">¡Este articulo no tiene opiniones!</p>
		`);
}

/*=============================================
SUBIR FOTO TEMPORAL DE OPINIÓN
=============================================*/
$("#fotoOpinion").change(function () {
  $(".alert").remove();

  var imagen = this.files[0];

  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $("#fotoOpinion").val("");

    $("#fotoOpinion").after(`

				<div class="alert alert-danger">¡La imagen debe estar en formato JPG o PNG!</div>
    		
    	`);

    return;
  } else if (imagen["size"] > 2000000) {
    $("#fotoOpinion").val("");

    $("#fotoOpinion").after(`

				<div class="alert alert-danger">¡La imagen no debe pesar más de 2MB!</div>
    		
    	`);

    return;
  } else {
    var datosImagen = new FileReader();

    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".prevFotoOpinion").attr("src", rutaImagen);
    });
  }
});