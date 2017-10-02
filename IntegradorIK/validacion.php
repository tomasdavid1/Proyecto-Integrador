<?php




/*
$gestor = fopen("usuarios.json", "r");
if ($gestor) {
    while (($linea = fgets($gestor))) {
    $usuario = json_decode($linea, true);
    if ($usuario['mail'] == $formulario['mail'] || $usuario['username'] == $formulario['username'] ) {
      return $usuario;
      fclose($gestor);
    } else {
      return $error =  'el usuario no existe ';
    }

    }
  fclose($gestor);
}

}*/

function subirImagen(){

if($_FILES["imgPerfil"]["error"] == UPLOAD_ERR_OK) {
  $nombre = $_FILES["imgPerfil"]["name"];
  $archivo= $_FILES["imgPerfil"]["tmp_name"];
  move_uploaded_file($archivo, "Desktop/proyecto-integrador-DH/IntegradorIK");
}

}
function validarCampo(){
  $errores = [];
  if ( $_POST['email'] == false) {
  $errores["email"] = $_POST['email'] . "email is required";
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = $_POST['email'] . " is not a valid email address";
  } else {
    $host= 'mysql:host=localhost;dbname=IKIGAI;charset=utf8mb4;port=3306';
    $db_user= 'root';
    $db_pass='root';
    $db = new PDO ($host, $db_user, $db_pass);
    $query = $db->prepare('SELECT usuario FROM usuarios where usuario = :email;');
    $email = $_POST['email'];
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    if ($results=$query->fetch(PDO::FETCH_ASSOC)) {
     $errores['email']= $_POST['email'].'usernme already exists';
    }

  }

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
if (!isset($_POST['email'])) {
  $errores["email"] = $_POST['email'] . "username is required";};

if (!isset($_POST['password'])){
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


function recuerdame(){

if (isset($_POST['recuerdame'])) {

setcookie('email', $datoValido, time()+60*60*7);
setcookie('password', $datoValido, time()+60*60*7);


};



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

$_SESSION = $a;
return $_SESSION;
}



function tieneSesion(){
  if ($_SESSION) {
     $_SESSION['username'] = $log_in['username'];
  }
}



 ?>
