<?php

require 'clase-9-validacion.php';


$email = "";
$name = "";
$username = "";


if($_POST){

  campoVacio($_POST);
  $errores = validarCampo();
  var_dump($errores);
  if($errores){
    if(isset($errores["email"])){
      echo $errores["email"];
    } else {
      $email = $_POST["email"];
    }
    if(isset($errores["name"])){
      echo $errores["name"];
    } else {
      $name = $_POST["name"];
    }
    if(isset($errores["username"])){
        echo $errores["username"];
      } else {
        $username = $_POST["username"];
      }

  } else {
    $datoValido["nombre"] = $_POST["name"];
    $datoValido["email"] = $_POST["email"];
    $datoValidado["password"] = hasheo($_POST);

    json($datoValido);

    iniciarSesion($datoValido);

    header("Location: bienvenido.php");
  }
}






?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Contact us</title>
</head>
<body>

    <div id='fg_membersite'>
        <form id='register' action='clase-9-register.php' method='post'>
            <fieldset >
                <legend>Registrate</legend>



                <div><span class='error'></span></div>
                <div class='container'>
                    <label for='name' >Nombre completo: </label><br/>
                    <input class= "nombre" type='text' name='name' id='name' value='<?php echo $name ?>' maxlength="50" /><br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>


                <div class='container'>
                    <label for='email' >Email:</label><br/>
                    <input type='text' name='email' id='email' value='<?php echo $email ?>' maxlength="50" /><br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>
                <div class='container'>
                    <label for='username' >Nombre de usuario*:</label><br/>
                    <input type='text' name='username' id='username' value='<?php echo $username ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>
                <div class='container' style='height:80px;'>
                    <label for='password' >Contaseña*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <input type='password' name='password' id='password' maxlength="50" />
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>

                <div class='container'>
                    <input type='submit' name='Submit' value='Enviar' />


                </div>

            </fieldset>
        </form>

        <?php



          ?>

    </body>
</html>
