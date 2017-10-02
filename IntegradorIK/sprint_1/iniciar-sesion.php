<?phpsession_start();
require '../validacion.php';

if (isset($_COOKIE['email'])) {
    $email= $_COOKIE['email'];
  }
if($_SESSION){

  header('Location:bienvenido.php');

} else {
  if ($_POST) {


    $errores = validarLogIn();
    if (!$errores) {
      $host= 'mysql:host=localhost;dbname=IKIGAI;charset=utf8mb4;port=3306';
      $db_user= 'root';
      $db_pass='root';
      $db = new PDO ($host, $db_user, $db_pass);
      $query = $db->prepare('SELECT email, password FROM usuarios where email = :email;');
      $email = $_POST['email'];
      $query->bindValue(':email', $email, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetch(PDO::FETCH_ASSOC);
      var_dump($results); 
      var_dump($_POST);
      echo '<br>verificando clave->'.password_verify($_POST['password'], $results['password']);
      if (password_verify($_POST['password'], $results['password'])) {
        echo 'Todo bien';
        almacenarEnSession($results);

        header('Location:Bienvenido.php');
      } else {
        $errores['email'] = "password o email incorrecto";

      }
      echo 'no hice nada';



    }
  }
}



?>
<html>  <head>    <meta charset="utf-8">    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <link rel="stylesheet" href="registrate2.css">    <link rel="stylesheet" href="animate.css">    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Roboto|Slabo+27px" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu|Cabin+Sketch:700|Crete+Round|Poiret+One">    <title>Sprint 1</title>  </head>  <body>    <section>      <div class="imagen-logo animated rotateIn">        <img src="logo.jpg" alt="IKIGAI 2017" class="logo">        </div>        <section id=presentacionDeEscritorio>          <div class="tituloDeEscritorio">            IKIGAI          </div>          <img src="logo.jpg" alt="Ikigai 2017" class="ikigai animated rotateIn">        </section>        <section class="formulario animated fadeInRight">          <div class="registrate">            Iniciar Sesión          </div>          <div class="cuerpo">            <form action="iniciar-sesion.php" method="POST">              <div class="campo">                <?php if (isset($errores['email'])) { ?>                  <div class="errores-de-campo">                   <?php echo  $errores['email'] ; ?>                  </div>                <?php }  ?>                <label for="email">Email</label>                <input type="text" name="email" id="email" value='<?php $email?>' placeholder="Usuario">              </div>              <div class="campo">                <label for="recuerdame">recuerdame</label>              <input type="checkbox" name="recuerdame" id='recuerdame'value="" <?php if (isset($COOKIE['email'])) {                echo 'checked';              } ?>>                <?php if (isset($errores['password'])) { ?>                  <div class="errores-de-campo">                   <?php echo  $errores['password'] ; ?>                  </div>                <?php }  ?>                <label for="password">Contraseña</label>                <input type="password" name="password" id="password" value="" placeholder="Contraseña">              </div>              <div class="">
                <button type="button" >Olvide mi contraseña</button>
              </div>
              <div class="enviar">                <button type="submit">                    Enviar                  </button>                </button>                  </div>                </form>            </div>                <div class="mandale">                  <h2 id="tenerunacuenta">¿No tenés una cuenta?<br> <a href="registrate2.php" id="iniciar">¡Registrate!</a></h3>                  </div>                  <div class="redes-sociales">                    <div class="red">                      <img src="signinwithfacebook.png" alt="">                    </div>                    <div class="red">                      <img src="signinwithlinkedin.png" alt="">                    </div>                    <div class="red">                      <img src="signinwithgoogle.png" alt="">                    </div>                  </div>                </section>              </section>              <section>                <div class="facebook">                </div>
                <div class="twitter">                </div>                <div class="google">              </div>        </section>    </body></html>