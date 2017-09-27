<?php
session_start();
require 'clase-9-validacion.php';

echo buscarUsuario($_SESSION);



 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php
      
      echo buscarUsuario($_SESSION);



       ?>

    </title>
  </head>
  <body>

    <div class="hola" style="background-color: red; font-size: large">

        Bienvenido


    </div>
  </body>
</html>
