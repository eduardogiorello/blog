
<?php 

/*=============================================
Seleccionar los artículos de la categoría especifica
=============================================*/

if(isset($rutas[0]) ){

	$articulos = ControladorBlog::ctrMostrarConInnerJoin(0, 5, "ruta_categoria", $rutas[0]);

	$totalArticulos = ControladorBlog::ctrMostrarTotalArticulos("id_cat", $articulos[0]["id_cat"]);

	$totalPaginas = ceil(count($totalArticulos)/5);

    // $articulosDestacados = ControladorBlog::ctrArticulosDestacados("id_cat", $articulos[0]["id_cat"]);

}
/*=============================================
Revisar si viene paginación de categorías
=============================================*/

if(isset($rutas[1])){

	if(is_numeric($rutas[1])){

		if($rutas[1] > $totalPaginas){

			echo '<script>

				window.location.href= "'.$blog["dominio"].'error404";

			</script>';

			return;

		}

		$paginaActual = $rutas[1];

		$desde = ($rutas[1] - 1)*5;
		$cantidad = 5;

		$articulos = ControladorBlog::ctrMostrarConInnerJoin($desde, $cantidad, "ruta_categoria", $rutas[0]);

	}else{

		echo '<script>

			window.location.href= "'.$blog["dominio"].'error404";

		</script>';

		return;
	}


}else{

	$paginaActual = 1;

}

// $anuncios = ControladorBlog::ctrTraerAnuncios("categorias");


 ?>



<div class="container-fluid bg-white contenidoInicio py-2 py-md-4">
	
	<div class="container">

		<!-- BREADCRUMB -->

		
		<ul class="breadcrumb bg-white p-0 mb-2 mb-md-4">

			<li class="breadcrumb-item inicio"><a href="<?php echo $blog["dominio"]; ?>">Inicio</a></li>

			<li class="breadcrumb-item active"><?php echo $articulos[0]["descripcion_categoria"];?></li>

		</ul>
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->


			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
				
			<?php foreach ($articulos as $key => $value): ?>
					<!-- ARTÍCULO 01 -->

				<div class="row">
					
					<div class="col-12 col-lg-5">

						<a href="<?=  $blog['dominio'].$value['ruta_categoria'].'/'.$value['ruta_articulo']; ?>"><h5 class="d-block d-lg-none py-3"><?= $value['titulo_articulo']; ?></h5></a>
			
						<a href="<?=  $blog['dominio'].$value['ruta_categoria'].'/'.$value['ruta_articulo']; ?>"><img src="<?= $blog['dominio'].$value['portada_articulo']; ?>" alt="<?= $value['titulo_articulo']; ?>" class="img-fluid" width="100%"></a>

					</div>

					<div class="col-12 col-lg-7 introArticulo">
						
						<a href="<?=  $blog['dominio'].$value['ruta_categoria'].'/'.$value['ruta_articulo']; ?>"><h4 class="d-none d-lg-block"><?= $value['titulo_articulo']; ?></h4></a>
						
						<p class="my-2 my-lg-5"><?= $value['descripcion_articulo']; ?></p>

						<a href="<?=  $blog['dominio'].$value['ruta_categoria'].'/'.$value['ruta_articulo']; ?>" class="float-right">Leer Más</a>

						<div class="fecha"><?= $value['fecha_articulo']; ?></div>

					</div>


				</div>

				<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">
				
			<?php endforeach ?>

				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center" totalPaginas="<?php echo $totalPaginas; ?>" paginaActual="<?php echo $paginaActual; ?>" rutaPagina="<?php echo $articulos[0]["ruta_categoria"]; ?>"></ul>

				</div>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

				<!-- ETIQUETAS -->	

				<div>

					<h4>Etiquetas</h4>
<?php 

						$tags = json_decode($articulos[0]["p_claves_categorias"], true);

					 ?>

					 <?php foreach ($tags as $key => $value): ?>

					 	<a href="<?php echo $blog["dominio"].preg_replace('/[0-9ñÑáéíóúÁÉÍÓÚ ]/', "_", $value); ?>" class="btn btn-secondary btn-sm m-1"><?php echo $value; ?></a> 
					 	
					 <?php endforeach ?>
										
				</div>	

				<!-- Artículos Destacados -->

				<div class="my-4">
					
					<h4>Artículos Destacados</h4>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="<?php echo $blog["dominio"]; ?>vistas/img/articulos/articulo-01/articulo01/articulo01.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="<?php echo $blog["dominio"]; ?>vistas/img/articulos/articulo-02/articulo02/articulo02.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>

					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="<?php echo $blog["dominio"]; ?>vistas/img/articulos/articulo-03/articulo03/articulo03/articulo03/articulo03.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>


				</div>

				<!-- PUBLICIDAD -->

				<div class="mb-4">
					
					<img src="<?php echo $blog["dominio"]; ?>vistas/img/ad03.png" class="img-fluid">

				</div>

				<div class="my-4">
					
					<img src="<?php echo $blog["dominio"]; ?>vistas/img/ad02.jpg" class="img-fluid">

				</div>	

				<div class="my-4">
					
					<img src="<?php echo $blog["dominio"]; ?>vistas/img/ad05.png" class="img-fluid">

				</div>	
				
			</div>

		</div>

	</div>

</div>