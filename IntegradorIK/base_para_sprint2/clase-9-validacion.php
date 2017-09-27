<pre>

<?php


$valor = $_POST;

function buscarUsuario($mail){

$gestor = fopen("clase-9-archivo.json", "r");
if ($gestor) {
    while (($linea = fgets($gestor)) !== false) {
    $usuario = json_decode($linea, true);
    if ($usuario['mail'] == $mail) {
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
      file_put_contents("clase-9-archivo.json", $json, FILE_APPEND | LOCK_EX);
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
 ?>

</pre>

</pre>
