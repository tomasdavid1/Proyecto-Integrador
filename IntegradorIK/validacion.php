<?php


$valor = $_POST;

function buscarUsuario($formulario){

$gestor = fopen("usuarios.json", "r");
if ($gestor) {
    while (($linea = fgets($gestor))) {
    $usuario = json_decode($linea, true);
    if ($usuario['mail'] == $formulario['mail'] || $usuario['username'] == $formulario['username'] ) {
      return $usuario;
      fclose($gestor);
    } else {
      echo "email or username doesen't exist";
    }

    }
  fclose($gestor);
}
return $usuario;
}


function validarCampo(){
  $errores = [];
  if ( $_POST['email'] == false) {
  $errores["email"] = $_POST['email'] . "email is required";
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = $_POST['email'] . " is not a valid email address";
  } //else if (){
      //aca deberia revisar si existe o no el mail
  //}

  if ( $_POST['apellido'] == false) {
  $errores["apellido"] = $_POST['apellido'] . "last name is required";
} else if (!is_string($_POST['apellido'])) {
    $errores["apellido"] = $_POST['apellido'] . " is not a valid last name ";
  }

  if ( $_POST['nombre'] == false) {
  $errores["nombre"] = $_POST['nombre'] . "name is required";
} else if (!is_string($_POST['nombre'])) {
    $errores["nombre"] = $_POST['nombre'] . " is not a valid name";
  }
  if ( $_POST['username'] == false) {
  $errores["username"] = $_POST['username'] . "username is required";
} else if (!is_string($_POST['username'])) {
    $errores["username"] = $_POST['username'] . " is not a valid username ";
  }
  if ( $_POST['password'] == false) {
  $errores["password"] = $_POST['password'] . "username is required";
} else if ($_POST['password']!== $_POST['password2']){

    $errores['password'] =  " passwords don't match";

  }

  return $errores;
}

function validarLogIn(){

$errores = [];
if ($_POST['username'] == false) {
$errores["username"] = $_POST['username'] . "username is required";};

if ($_POST['password'] == false ){
  $errores["password"] = $_POST['password'] . "password is required";
}

}

function campoCompleto($campo){
  if (!empty($campo)) {

      return true;
  } else {
      return false;
    }
}



function hasheo($formulario){
  $password= password_hash($formulario["password"], PASSWORD_DEFAULT);


  unset($formulario['submitted']);
  unset($formulario['Submit']);

  return $password;

}

function json($datosOk){

      $json = json_encode($datosOk) . PHP_EOL;
      file_put_contents("usuarios.json", $json, FILE_APPEND | LOCK_EX);

}
function almacenarEnSession($a){
session_start();
$_SESSION = $a;
return $_SESSION;
}

function campoVacio($data){



  foreach ($data as $key => $value) {

    if (campoCompleto($value) == false) {

      echo $key. " es obligatorio";



    }
  }

}

function tieneSesion(){
  if ($_SESSION) {
     $_SESSION['username'] = $log_in['username'];
  }
}



 ?>
