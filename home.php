<?php
session_start();
include ("header.php");
 ?>

 <div class="faq-page">
 <div class="faq">
 <? if(isset($_SESSION['autentificado'])){ ?>
   <h1>Bienvenido <?=$_SESSION["usuario"]?></h1>
   <h2>Compra y vende todo lo que siempre quisiste</h2>
<? }else{ ?>
	 <h1>Home</h1>
     <h2>Compra y vende todo lo que siempre quisiste</h2>

     <p class="message2">Ya estas Registrado? <a href="login.php">Inicia sesión aquí</a></p>
<? } ?>

   </form>
 </div>
</div>
</body>
</html>
