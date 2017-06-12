<?php

/**
 * Created by PhpStorm.
 * User: emilianobivachi
 * Date: 28/5/17
 * Time: 12:54 PM
 */
require_once ("Repository.php");
require_once ("SQLDataBase.php");


class UserController {

  private $dataBase;
  private $errors;

  public function __construct(SQLDataBase $sqlDataBase) {
    $this->setDataBase($sqlDataBase);
    $this->errors = [];
  }

  public function setDataBase(SQLDataBase $dataBase) {
    $this->dataBase = $dataBase;
  }

  public function validateLogin(User $user) {
    $this->checkLoginUserTypingErrors($user);

    if (count($this->errors) == 0) {
      $this->checkUserInDataBase($user);
    }
    return $this->errors;
  }

  public function validateRegister(User $user) {
    $this->checkRegisterUserTypingErrors($user);

    if (count($this->errors) == 0) {
      $this->checkAndAddToDataBase($user);
    }
    return $this->errors;
  }

  public function checkLoginUserTypingErrors(User $user) {
    $this->errors = [];

    if (trim(strlen ($user->getUsername())) < 2) {
      $this->errors["usuario"] = "Usuario inaválido";
    }
    if(trim($user->getUsername()==="")){
      $this->errors["usuario"]="Completar usuario";
    }
    $pass = trim($user->getPassword());

    if (strlen ($pass) <4 && strlen($pass >0)) {
      $this->errors["password"] = "Contraseña incorrecta";
    }
    if(strlen($pass) == 0){
      $this->errors["password"]= "Debes llenar la contraseña";
    }

  }

  public function checkUserInDataBase(User $user) {
    $username=$user->getUsername();
    $password=$user->getPassword();
    $conuntArray = $this->dataBase->loginCheckUserAndPassword($username , $password);

    if($conuntArray["count"]== 1){
      session_start();
      $_SESSION["usuario"]=$username;
      $_SESSION["autentificado"]=true;
      header("location:home.php");exit;

    }elseif($conuntArray["count"] != 1 && $conuntArray["countUsers"] == 1){
      $passwordError = "Contraseña incorrecta";
      $this->errors["password"]= $passwordError;
    }else{
      $usernameError = "El usuario no existe";
      $this->errors["usuario"]=$usernameError;
    }

  }

  public function checkRegisterUserTypingErrors(User $user) {
    $this->errors = [];
    if (trim($user->getName()) === "") {
      $this->errors["name"] = "Nombre incorrecto";
    }

    if (trim($user->getUsername()) === "" || strlen(trim($user->getUsername())) <4) {
      $this->errors["usuario"] = "Usuario incorrecto";
    }

    $email = trim($user->getMail());

    if ($email === "") {
      $this->errors["mail"] = "Email inválido";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->errors["mail"] = "Email inválido";
    }

    $pass = trim($user->getPassword());
    $cpass = trim($user->getCPassword());
    if (strlen ($pass) <4) {
      $this->errors["password"] = "Contraseña incorrecta";
    }
    if (strlen ($cpass) <4) {
      $this->errors["cpassword"] = "Contraseña incorrecta";
    }
    if ($pass != "" && $cpass != "" && $pass != $cpass) {
      $this->errors["password"] = "Las contraseñas no coinciden";
    }
  }

  public function checkAndAddToDataBase(User $user) {
    $conuntArray = $this->dataBase->registerCheckUserAndEmail($user->getUsername() , $user->getMail());

    if($conuntArray["countUsers"] == 0 && $conuntArray["countEmail"] == 0){
      $this->dataBase->addUser($user);
      header("location:login.php");
      exit;

    }elseif($conuntArray["countUsers"] != 0 && $conuntArray["countEmail"] != 0){
      $emailError="Email existente";
      $this->errors["mail"]=$emailError;

      $usernameError="Usuario existente";
      $this->errors["usuario"]=$usernameError;
    }elseif($conuntArray["countUsers"] != 0 && $conuntArray["countEmail"] == 0){
      $usernameError="Usuario existente";
      $this->errors["usuario"]=$usernameError;
    }else{
      $emailError="Email existente";
      $this->errors["mail"]=$emailError;
    }
  }

}