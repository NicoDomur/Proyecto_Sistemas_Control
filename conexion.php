<?php
function conectar(){
    try {
        $con = mysqli_connect("localhost","root", "","exoticars");
        return $con;
    } catch (\Exception $e) {
          echo "<br>Fallo la conexion con MySQL: " . $e . "<br>";
          header("Location: index.html");
    }
}
 ?>
