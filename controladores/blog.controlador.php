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
	static public function ctrMostrarConInnerJoin($desde, $cantidad,$item,$valor){

		$tabla1 = "categorias";
		$tabla2 = "articulos";

		$respuesta = ModeloBlog::mdlMostrarConInnerJoin($tabla1, $tabla2,$desde, $cantidad,$item,$valor);

		return $respuesta;

	}


/*=============================================
	Mostrar total articulos
	=============================================*/

	static public function ctrMostrarTotalArticulos($item, $valor){

		$tabla = "articulos";

		$respuesta = ModeloBlog::mdlMostrarTotalArticulos($tabla, $item, $valor);

		return $respuesta;

	}

/*=============================================
	Mostrar opiniones con inner join
	=============================================*/
	static public function ctrMostrarArticulos($item, $valor){
		$tabla1= 'opiniones';
		$tabla2 = 'administradores';
		$respuesta = ModeloBlog::mdlMostrarOpiniones($tabla1,$tabla2, $item, $valor);

		return $respuesta;
	}

	/*=================
	Enviar opiniones
	=================*/
	static public function ctrEnviarOpinion(){

		if (isset($_POST['nombre_opinion'])) {

			if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["nombre_opinion"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo_opinion"]) &&
			   preg_match('/^[=\\$\\;\\*\\"\\?\\¿\\!\\¡\\:\\.\\,\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/',  $_POST["contenido_opinion"])){


				/********************************
				 * VALIDACION FOTO LADO SERVIDOR
				 * *******************************/
				if(isset($_FILES['fotoOpinion']['tmp_name']) && !empty($_FILES['fotoOpinion']['tmp_name'])){
					/********************************************************************
				 * CAPTURAR ANCHO Y ALTO ORIGINAL DE LA IMAGEN Y DEFINIR NUEVOS VALORES
				 * *********************************************************************/
					list($ancho, $alto) = getimagesize($_FILES['fotoOpinion']['tmp_name']);

					$nuevoAncho = 128;
					$nuevoAlto = 128;


				/****************************************
				 *CREAMOS DIRECTORIO DONDE GUARDAR IMAGEN
				 * ***************************************/

				 $directorio = "vistas/img/usuarios/";
				/********************************************************************
				 * DE A CUERDO AL TIPO DE IMAGEN FUNCIONES DE PHP ESPECIFICAS
				 * *********************************************************************/
				if($_FILES['fotoOpinion']['type'] = "image/jpeg"){

					$aleatorio = mt_rand(100,9999);
					$ruta = $directorio.$aleatorio.'.jpg';

					$origen = imagecreatefromjpeg($_FILES['fotoOpinion']['tmp_name']);//crea imagen
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);



				} elseif($_FILES['fotoOpinion']['type'] = "image/png"){

					$aleatorio = mt_rand(100,9999);
					$ruta = $directorio.$aleatorio.'.png';


					$origen = imagecreatefrompng($_FILES['fotoOpinion']['tmp_name']);//crea imagen
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0,0,0,0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				} else{
					return "error-formato";
				}

				} else{
					$ruta = 'vistas/img/usuarios/default.png';				}


				$tabla='opiniones';

						$datos = array(
							   "id_art" => $_POST["id_art"],
							   "nombre_opinion" => $_POST["nombre_opinion"],
							   "correo_opinion" => $_POST["correo_opinion"],
							   "foto_opinion" => $ruta,
							   "contenido_opinion" => $_POST["contenido_opinion"],
							   "fecha_opinion"=> date('Y-m-d'),
							    "id_adm" => 1
							   );

					$respuesta = ModeloBlog::mdlEnviarOpinion($tabla, $datos);

					return $respuesta;
		} else{
			return 'error';
		}
	}

	}
}