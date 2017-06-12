<?php

/**
 * Created by PhpStorm.
 * User: emilianobivachi
 * Date: 27/5/17
 * Time: 8:41 PM
 */

require_once ("Repository.php");

class SQLDataBase implements Repository {

  private $db;

  function __destruct() {
    $this->db = null;
  }

  public function __construct() {
    $dsn='mysql:host=localhost;dbname=usuarios;charset=utf8mb4;port=3306';
    $db_user="root";
    $db_pass="root";
    try{
      $this->db =new PDO($dsn,$db_user,$db_pass);
    }catch(PDOException $exception){
      echo $exception-> getMessage();
    }
  }

  public function addUser(User $user) {
    $usernameDefault = $user->getUsername();
    $email = $user->getMail();
    $password = $user->getHashPassword();
    $newConfirm = $user->getHashPassword();
    $nameDefault = $user->getName();
    $sql = "INSERT INTO usuarios(usuario,mail,password,cpassword,nombre) VALUES( '$usernameDefault' , '$email' , '$password' , '$newConfirm' , '$nameDefault')";

    $stmt= $this->db -> prepare ($sql);

    $stmt -> execute();
  }

  public function giveAllUsers() {
    $stmt= $this->db -> prepare ("SELECT * FROM usuarios");
    $stmt -> execute();
  }

  public function loginCheckUserAndPassword($username , $password) {

    $newPassword=md5($password);
    $queryUserName = "SELECT * FROM usuarios WHERE usuario = '$username' ";
    $queryUSerNaemAndPassword = "SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$newPassword' ";

    $selectUsers= $this->db -> prepare($queryUserName);
    $selectUsers -> execute();
    $countUsers = $selectUsers -> rowCount();

    $select = $this->db -> prepare($queryUSerNaemAndPassword);
    $select -> execute();
    $count = $select -> rowCount();

    $countArray = array("countUsers"=>$countUsers,"count"=>$count);

    return $countArray;
  }

  public function registerCheckUserAndEmail($username , $mail) {

    $queryUserName = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $queryUSerNameAndEmail = "SELECT * FROM usuarios WHERE mail = '$mail' ";

    $selectUsers= $this->db -> prepare($queryUserName);
    $selectUsers -> execute();
    $countUsers = $selectUsers -> rowCount();

    $select = $this->db -> prepare($queryUSerNameAndEmail);
    $select -> execute();
    $count = $select -> rowCount();

    $countArray = array("countUsers"=>$countUsers,"countEmail"=>$count);

    return $countArray;
  }

  public function existUser(User $user) {
    // TODO: Implement existUser() method.
  }

  public function deleteUser() {
    // TODO: Implement deleteUser() method.
  }

}