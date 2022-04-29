<?php 


class ControladorBlog{

	 /****************************************
	 ** Mostrar contenido de la tabla blog **
	 ****************************************/
	static public function ctrMostrarBlog(){

		$tabla = "blog";

		$respuesta = ModeloBlog::mdlMostrarBlog($tabla);

		return $respuesta;

	}
	

	/***********************
	 ** Mostrar categorias**
	 ***********************/
	static public function ctrMostrarCategorias(){

		$tabla = "categorias";

		$respuesta = ModeloBlog::mdlMostrarCategoria($tabla);

		return $respuesta;

	}
	
	/**************************************************
	 ** Mostrar articulos y categorias Con Inner Join**
	 **************************************************/
	static public function ctrMostrarConInnerJoin($desde, $cantidad){

		$tabla1 = "categorias";
		$tabla2 = "articulos";

		$respuesta = ModeloBlog::mdlMostrarConInnerJoin($tabla1, $tabla2,$desde, $cantidad);

		return $respuesta;

	}


/*=============================================
=            mostrar cantidad de articulos   =
=============================================*/
	static public function ctrMostrarTotalArticulos(){

		$tabla= "articulos";
		

		$respuesta = ModeloBlog::mdlMostrarTotalArticulos($tabla);

		return $respuesta;

	}

	

}