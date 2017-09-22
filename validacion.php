<pre>

<?php


$valor = $_POST;

function buscarUsuario($formulario){

$gestor = fopen("usuarios.json", "r");
if ($gestor) {
    while (($linea = fgets($gestor)) !== false) {
    $usuario = json_decode($linea, true);
    if ($usuario['mail'] == $formulario['mail']) {
      return $usuario;
        }

    }
      fclose($gestor);
}
fclose($gestor);
}


function validarCampo(){
  $errores = [];
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = $_POST['email'] . "is not a valid email address";
  }

  if (!is_string($_POST['name'])) {
    $errores["name"] = $_POST['name'] . "is not a valid name";
  }

  if (!is_string($_POST['username'])){
    $errores["username"] =  $_POST['username'] . "is not a valid username";
  }

  if ($_POST['password']!== $_POST['password2']){

    $errores['password'] =  "passwords don't match"

  }

  return $errores;
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

};

function json($datosOk){

      $json = json_encode($datosOk) . PHP_EOL;
      file_put_contents("usuarios.json", $json, FILE_APPEND | LOCK_EX);
      // $todosLosUsuarios = json_decode(file_get_contents("clase-9-archivo.json"), true);

  // } else {
  //   $todosLosUsuarios = [];
  // }

}
function iniciarSesion($a){
session_start();
$_SESSION = $a;
return $_SESSION;
}

function campoVacio($_POST){



  foreach ($_POST as $key => $value) {

    if (campoCompleto($value) == false) {

      echo $key. " es obligatorio";



    }
  }

}

function tieneSesion(){

if ($_SESSION) {
  $log_in['username'] = $_SESSION['username'];
  $log_in['password'] = $_SESSION['password'];

}

}


 ?>

</pre>

</pre>
