<?php
include("validacion.php");
$usernameDefault ="";
$emaildefault = "";
$passwordDefault="";
$cpasswordDefault="";
$usernameError ="usuario";
$passwordError ="contraseña";
$emailError="email";
$nameDefault="";
$nameError = "nombre";
if ($_POST) {
  $errors = validateRegister($_POST);
  if (count($errors) == 0) {

    $dsn='mysql:host=localhost;dbname=usuarios;charset=utf8mb4;port=3306';
    $db_user="root";
    $db_pass="root";
    try{
        $db=new PDO($dsn,$db_user,$db_pass);
    }catch(PDOException $exception){
        echo $exception-> getMessage();
    }

    $nameDefault=$_POST["name"];
    $emaildefault=$_POST["mail"];
    $usernameDefault=$_POST["usuario"];
    $passwordDefault=$_POST["password"];
    $cpasswordDefault=$_POST["cpassword"];

    $newPassword=md5($passwordDefault);
    $newConfirm=md5($cpasswordDefault);

    $selectUsuarios= $db -> prepare("SELECT * FROM usuarios WHERE usuario = '$usernameDefault'");
    $selectUsuarios -> execute();

    if($selectUsuarios -> rowCount()== 0){

      $selectMail=$db -> prepare("SELECT * FROM usuarios WHERE mail = '$emaildefault' ");
      $selectMail -> execute();

      if($selectMail -> rowCount() == 0){

        $stmt=$db -> prepare ("INSERT INTO usuarios(usuario,mail,password,cpassword,nombre) VALUES( '$usernameDefault' , '$emaildefault' , '$newPassword' , '$newConfirm' , '$nameDefault')");

        $stmt -> execute();        
      }else{
        $emailError="Email existente";
        $errors["mail"]=$emailError;
      }


    }else{
      $usernameError="Usuario exitente";
      $errors["usuario"]=$usernameError;
    }

  }
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