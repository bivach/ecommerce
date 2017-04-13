<?php

function validateLogin($datos) {
	$errores = [];

	if (trim($datos["usuario"]) === "") {
		$errores["usuario"] = "El usuario no puede estar vacio";
	}

	$pass = trim($_POST["password"]);
	
	if ($pass === "") {
		$errores["password"] = "Llena la pass";
	}

	return $errores;
}

function validateRegister($datos) {
	$errores = [];

	if (trim($datos["usuario"]) === "") {
		$errores["usuario"] = "El usuario no puede estar vacio";
	}

	$email = trim($datos["mail"]);

	if ($email === "") {
		$errores["mail"] = "Completa el campo email";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errores["mail"] = "Mal formato de email";
	}

	$pass = trim($_POST["password"]);
	$cpass = trim($_POST["cpassword"]);
	if ($pass === "") {
		$errores["password"] = "Llena la contraseña";
	}
	if ($cpass === "") {
		$errores["cpassword"] = "Llena la contraseña";
	}
	if ($pass != "" && $cpass != "" && $pass != $cpass) {
		$errores["password"] = "Las contraseñas no coinciden";
	}

	return $errores;
}
