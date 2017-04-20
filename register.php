<?php
include("validacion.php");
$usernameDefault ="";
$emaildefault = "";
$usernameError ="usuario";
$passwordError ="contraseña";
$nameDefault="";
$nameError = "nombre";
if ($_POST) {
  $errors = validateRegister($_POST);
  if (count($errors) == 0) {
    //ACA HABRIA QUE GUARDAR AL USUARIO EN CASO DE QUE NO HUBIERA HABIADO ERROR EN LA REGISTRACION.

    $usuario = crearUsuario($_POST);

			//Guardar el usuario
			guardarUsuario($usuario);

    header("location:login.php");exit;
  }
  if (!isset($errores["mail"])) {
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
            <input id= 'error' type="text" name = "usuario" placeholder="<?=$usernameError?>" value="<?=$usernameDefault?>"/>
            <?php
          }else {?>
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

                <input id= 'error' type="email" name= "mail" placeholder="Email inválido" value="<?=$emaildefault?>"/>

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
