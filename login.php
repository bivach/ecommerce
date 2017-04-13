<?php
  include("validacion.php");
  $usernameDefault ="";
  if($_POST){
    $errors = validateLogin($_POST);
    if (count($errors) == 0) {
			header("location:home.php");exit;
		}
    if (!isset($errores["usuario"])) {
			$usernameDefault = $_POST["usuario"];
		}
    var_dump($errors);

  }
  include ("header.php");

   ?>
  <div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="login.php">
      <input type="text" name= "usuario" placeholder="usuario" value="<?=$usernameDefault?>"/>
      <input type="password" name = "password" placeholder="contraseña"/>
      <input type='submit' id = "submit" name='Submit' value='Iniciar Sesión' />
      <p id = "recorda">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Recordame
          </label>
        </p>

      <p class="message">No estas registrado? <a href="register.php">Crea una cuenta</a></p>

    </form>
  </div>
</div>

</body>
</html>
