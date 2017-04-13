<?php
include("validacion.php");
if ($_POST) {
  $errors = validateRegister($_POST);
  if (count($errors) == 0) {
    header("location:login.php");exit;
  }
  var_dump($errors);

}

include ("header.php");
 ?>

  <div class="login-page">

  <div class="form">

    <form class="login-form" method="post" action="register.php">
      <input type="text" name= "usuario" placeholder="usuario"/>
      <input type="password" name = "password" placeholder="contraseña"/>
      <input type="password" name = "cpassword" placeholder="comfirmar contraseña"/>
      <input type="email" name= "mail" placeholder="cuenta de email"/>
      <input type='submit' id = "submit" name='Submit' value='Crear Cuenta' />
      <p class="message2">Ya estas registrado? <a href="login.php">Inicia Sesión</a></p>
    </form>

  </div>

</div>


</body>
</html>
