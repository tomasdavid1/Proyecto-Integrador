<!DOCTYPE html>


<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


Edite sus datos aqui

<form class="" action="index.html" method="post">

  <label for="">Usuario: </label>
  <input type="text" name="" value=<?php echo $_SESSION['usuario']  ?>>

  <label for="">email: </label>
  <input type="email" name="" value=<?php echo $_SESSION['email']  ?>>




</form>

  <div class="">

     <a href="cambieContraseña.php">Cambie su contraseña</a>
  </div>

  </body>
</html>
