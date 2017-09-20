<?php
session_start();
if(isset($_SESSION["Contador"])){
  var_dump($_SESSION["Contador"]);
} else {
  $_SESSION["Contador"] = 0;
}

  if (isset($_POST["reiniciar"])) {

    $_SESSION["Contador"] =0;

  } elseif (isset($_POST["incrementar"])) {
    $_SESSION["Contador"]++;
  }

  if (isset($_POST["color"])) {
    $color = $_POST["color"] ;
  $_SESSION["color"]= $color;}

?>

<body style="background-color: <?php echo $_SESSION["color"]?>" >

bla bal

var_dump

</body>
