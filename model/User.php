<?php

/**
 * Created by PhpStorm.
 * User: emilianobivachi
 * Date: 27/5/17
 * Time: 8:35 PM
 */
class User {

  private $username;
  private $name;
  private $password;
  private $cpassword;
  private $mail;

  function __construct($username, $name, $password, $mail, $cpassword) {
    $this->setUsername($username);
    $this->setName($name);
    $this->setPassword($password);
    $this->setMail($mail);
    $this->setCPassword($cpassword);
  }

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getCPassword() {
    return $this->cpassword;
  }

  public function setCPassword($cpassword) {
    $this->cpassword = $cpassword;
  }

  public function getHashPassword() {
    return md5($this->password);
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getMail() {
    return $this->mail;
  }

  public function setMail($mail) {
    $this->mail = $mail;
  }

}