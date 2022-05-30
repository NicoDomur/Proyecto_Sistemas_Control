<?php
$nombre = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

if(empty($nombre) || empty($contrasena)){
  echo '<script> alert("Campos sin rellenar."); window.location.href="login.html"; </script>';
//header("Location: login.html");
  exit();
}

include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()) {
  echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}

$sql = "SELECT * FROM usuarios WHERE CtaUsuario='" . $nombre . "'";
$query = mysqli_query($con, $sql);

echo $sql;

