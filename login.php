<?php

  $usernameDefault ="";
  $usernameError ="usuario";
  $passwordError ="contraseña";
  $checkboxState = "";

  if($_POST){
    require_once("controller/UserController.php");
    require_once("model/User.php");

    $userController = new UserController(new SQLDataBase());
    $user = new User($_POST["usuario"],null,$_POST["password"],null,null);

    $errors = $userController->validateLogin($user);

    //SET DEFAULT VALUES
    if (isset($_POST["remember_me"])) {
      $checkboxState = "checked";
    }
    if (!isset($errors["usuario"])) {
      $usernameDefault = $_POST["usuario"];
    }else {
      $usernameError = $errors["usuario"];
    }
    if (isset($errors["password"])) {
      $passwordError = $errors["password"];
    }

  }

  require_once("header.php");

   ?>

  <div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="login.php">


      <?php
          if (isset($errors["usuario"])) {?>
            <input id= 'error' type="usuario" name = "usuario" placeholder="<?=$usernameError?>" value="<?=$usernameDefault?>"/>
            <?php
          }else {?>
              <input type="usuario" name = "usuario" placeholder="<?=$usernameError?>" value="<?=$usernameDefault?>"/>
            <?php
          }
       ?>

      <?php
          if (isset($errors["password"])) {?>
            <input id= 'error' type="password" name = "password" placeholder="<?=$passwordError?>"/>
            <?php
          }else {?>
              <input type="password" name = "password" placeholder="<?=$passwordError?>"/>
            <?php
          }
       ?>

      <input type='submit' id = "submit" name='Submit' value='Iniciar Sesión' />
      <p id = "recorda">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me" <?=$checkboxState?>>
            Recordame
          </label>
        </p>

      <p class="message">No estas registrado? <a href="register.php">Crea una cuenta</a></p>
      <p class="message">Olvidaste la contraseña? <a href="register.php">Ingresa aquí</a></p>

    </form>
  </div>
</div>

</body>
</html>