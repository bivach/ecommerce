<?php

    $usernameDefault ="";
    $emaildefault = "";
    $passwordDefault="";
    $cpasswordDefault="";
    $nameDefault="";
    $usernameError ="usuario";
    $passwordError ="contraseña";
    $emailError="email";
    $nameError = "nombre";

    if ($_POST){

      require_once("controller/SQLDataBase.php");
      require_once("controller/UserController.php");
      require_once("model/User.php");
      $userController = new UserController(new SQLDataBase());
      $user = new User($_POST["usuario"],$_POST["name"],$_POST["password"],$_POST["mail"],$_POST["cpassword"]);
      $errors = $userController->validateRegister($user);

      if (!isset($errors["mail"])) {
        $emaildefault = $_POST["mail"];
      }

      if (!isset($errors["usuario"])) {
        $usernameDefault = $_POST["usuario"];
      }else {
        $usernameError = $errors["usuario"];
      }

      if (!isset($errors["name"])) {
        $nameDefault = $_POST["name"];
      }else {
        $nameError = $errors["name"];
      }

      if (isset($errors["password"])) {
        $passwordError = $errors["password"];
      }
    }

    include ("header.php");
 ?>

  <div class="login-page">

  <div class="form">

    <form class="login-form" method="post" action="register.php">

      <?php
          if (isset($errors["name"])) {?>
            <input id= 'error' type="text" name = "name" placeholder="<?=$nameError?>" value="<?=$nameDefault?>"/>
            <?php
          }else {?>
              <input type="text" name = "name" placeholder="<?=$nameError?>" value="<?=$nameDefault?>"/>
            <?php
          }
       ?>

      <?php
          if (isset($errors["usuario"])) {?>
            <input id= 'error' type="text" name = "usuario" placeholder="<?=$usernameError?>" />
            <?php 
          }  else {?>
              <input type="usuario" name = "usuario" placeholder="<?=$usernameError?>" value="<?=$usernameDefault?>"/>
            <?php
          }
       ?>

      <?php
           if (isset($errors["password"]) || isset($errors["cpassword"])) {?>
             <input id= 'error' type="password" name = "password" placeholder="<?=$passwordError?>"/>
             <input id= 'error' type="password" name = "cpassword" placeholder="comfirmar contraseña"/>
             <?php
           }else {?>
               <input type="password" name = "password" placeholder="<?=$passwordError?>"/>
               <input type="password" name = "cpassword" placeholder="comfirmar contraseña"/>
             <?php
           }
      ?>

      <?php
        if (isset($errors["mail"])) {?>

            <input id= 'error' type="email" name= "mail" placeholder="<?=$emailError?>"/>

          <?php
        }else {?>

            <input type="email" name= "mail" placeholder="cuenta de email" value="<?=$emaildefault?>"/>
          <?php
        }
     ?>

      <input type='submit' id = "submit" name='Submit' value='Crear Cuenta' />
      <p class="message2">Ya estas registrado? <a href="login.php">Inicia Sesión</a></p>
    </form>
  </div>

</div>

</body>
</html>