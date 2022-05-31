<?php
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()) {
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];
$num_pta = $_POST['num_pta'];
$tip_comb = $_POST['tip_comb'];
$tip_carr = $_POST['tip_carr'];
$ruta_img = $_POST['ruta_img'];

$sql = "INSERT INTO `catalogo_carros` (`IDCarro`, `Imagen`, `Marca`, `Modelo`, `Anio`, `Estado`, `Precio`, `NumPuertas`, `TipoCombustible`, `TipoCarro`) 
        VALUES (NULL, '$ruta_img', '$marca', '$modelo', '$anio', '$estado', '$precio', '$num_pta', '$tip_comb', '$tip_carr') ";
$query = mysqli_query($con, $sql);
if ($query) {
    header("Location: admin.php");
} else {
    echo "El id ya no es valido";
}
