<?php

/**
 * Created by PhpStorm.
 * User: emilianobivachi
 * Date: 27/5/17
 * Time: 8:42 PM
 */
interface Repository {
  public function addUser(User $user);
  public function deleteUser();
  public function giveAllUsers();
  public function existUser(User $user);
  public function loginCheckUserAndPassword($username , $password);

}