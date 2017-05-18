<?php
  include("validacion.php");
  $usernameDefault ="";
  $usernameError ="usuario";
  $passwordError ="contraseña";
  $checkboxState = "";

  if($_POST){

    $errors = validateLogin($_POST);
    if (count($errors) == 0) {
      $dsn='mysql:host=localhost;dbname=usuarios;charset=utf8mb4;port=3306';
      $db_user="root";
      $db_pass="root";
      try{
          $db=new PDO($dsn,$db_user,$db_pass);
      }catch(PDOException $exception){
          echo $exception-> getMessage();
      }
      $username=$_POST["usuario"];
      $password=$_POST["password"];

      $newPassword=md5($password);

      $selectUsuarios= $db -> prepare("SELECT * FROM usuarios WHERE usuario = '$username' ");
      $selectUsuarios -> execute();
      $countUsuarios = $selectUsuarios -> rowCount();

      $select = $db -> prepare("SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$newPassword' ");
      $select -> execute();
      $count = $select -> rowCount();

      if($count== 1){
        session_start();
        $_SESSION["usuario"]=$username;
        $_SESSION["autentificado"]=true;
        header("location:home.php");exit;

      }elseif($count != 1 && $countUsuarios == 1){
        $passwordError = "Contraseña incorrecta";
        $errors["password"]= $passwordError;

      }else{
        $usernameError = "El usuario no existe";
        $errors["usuario"]=$usernameError;
      }

    }

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

  include ("header.php");

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