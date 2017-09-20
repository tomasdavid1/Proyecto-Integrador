<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>

    </title>
  </head>
  <body>


    <?php

    $a = ['a'=>1,
          'b'=>2,
          'c'=>'Yo <3 JSON'];
        var_dump($a);

    $a= json_encode($a);
    var_dump($a);
    $b = json_decode($a, true);
    echo $b["a"];

    $archivo = "clase-7-archivos.php";
    $veces100 = "Hola Mundo\n";


        function comprobar($archivo){
          global $veces100;
          //if(file_exists($archivo)){
            for($i=1; $i <=5 ; $i++) {
              file_put_contents($archivo, $veces100, FILE_APPEND | LOCK_EX);
            }

          return $archivo;
        }
        comprobar("clase-7-archivos.php");

        function mostrarFuncion($archivo){



        $c = file_get_contents($archivo);
        echo $c;

        }

        mostrarFuncion($archivo);

        // function mostrar ($a){
        //   echo comprobar();
        // }


?>

  </body>
</html>
