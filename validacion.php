<?php

function validateLogin($datos) {
	$errores = [];

	if (trim($datos["usuario"]) > 4) {
		$errores["usuario"] = "Usuario inaválido";
	}
	if(trim($datos["usuario"]==="")){
		$errores["usuario"]="Completar usuario";
	}

	$pass = trim($_POST["password"]);

	if (strlen ($pass) <4 && strlen($pass >0)) {
		$errores["password"] = "Contraseña incorrecta";
	}
	if(strlen($pass) == 0){
		$errores["password"]= "Debes llenar la contraseña";
	}

	return $errores;
}


function validateRegister($datos) {
	$errores = [];

	if (trim($datos["name"]) === "") {
		$errores["name"] = "Nombre incorrecto";
	}

	if (trim($datos["usuario"]) === "" || strlen(trim($datos["usuario"])) <4) {
		$errores["usuario"] = "Usuario incorrecto";
	}

	$email = trim($datos["mail"]);

	if ($email === "") {
		$errores["mail"] = "Email inválido";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores["mail"] = "Email inválido";
	}

	$pass = trim($_POST["password"]);
	$cpass = trim($_POST["cpassword"]);
	if (strlen ($pass) <4) {
		$errores["password"] = "Contraseña incorrecta";
	}
	if (strlen ($cpass) <4) {
		$errores["cpassword"] = "Contraseña incorrecta";
	}
	if ($pass != "" && $cpass != "" && $pass != $cpass) {
		$errores["password"] = "Las contraseñas no coinciden";
	}

	return $errores;
}


//function crearUsuario($datos) {
//		$usuario = [
//			"name" => $datos["name"],
//			"usuario" => $datos["usuario"],
//			"mail" => $datos["mail"],
//			"password" => password_hash($datos["password"], PASSWORD_DEFAULT),
//		];
//
//		$usuario["id"] = traerNuevoId();
//
//		return $usuario;
//	}
//
//	function traerNuevoId() {
//		$archivo = file_get_contents("usuarios.json");
//
//		// Si el archivo estaba vacio devuelvo 1
//		if ($archivo == "") {
//			return 1;
//		}
//
//		// Divido mi archivo por enters
//		$usuarios = explode(PHP_EOL, $archivo);
//
//		// Borro la linea del enter vacio
//		array_pop($usuarios);
//
//		// Obtengo el ultimo usuario
//		$ultimoUsuario = $usuarios[count($usuarios) - 1];
//
//		// Transformo mi ultimo usuario en formoto array
//		$ultimoUsuario = json_decode($ultimoUsuario,true);
//
//		// Devuelvo ese id + 1
//		return $ultimoUsuario["id"] + 1;
//	}
//

//	function guardarUsuario($usuario) {
//		$json = json_encode($usuario);
//
//		file_put_contents("usuarios.json", $json . PHP_EOL, FILE_APPEND);
//	}
//
//
//	function dameUnoPorMail($mail) {
//		$usuarios = dameTodos();
//
//		foreach ($usuarios as $usuario) {
//			if ($usuario["mail"] == $mail) {
//				return $usuario;
//			}
//		}
//
//		return NULL;
//	}


//	function dameTodos() {
//		$archivo = file_get_contents("usuarios.json");
//
//		// Lo separo linea por linea
//		$usuariosJSON = explode(PHP_EOL, $archivo);
//
//		// Borro el enter vacio
//		array_pop($usuariosJSON);
//
//		$usuariosFinal = [];
//		foreach ($usuariosJSON as $usuarioJSON) {
//			$usuariosFinal[] = json_decode($usuarioJSON,true);
//		}
//
//		return $usuariosFinal;
//	}
//
//	function dameUnoPorId($id) {
//		$usuarios = dameTodos();
//
//		foreach ($usuarios as $usuario) {
//			if ($usuario["id"] == $id) {
//				return $usuario;
//			}
//		}
//
//		return NULL;
//	}
