<?php
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()){
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$anio = $_POST['anio'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];
$num_pta = $_POST['num_pta'];
$tip_comb = $_POST['tip_comb'];
$tip_carr = $_POST['tip_carr'];
$ruta_img = $_POST['ruta_img'];

$sql = "UPDATE `catalogo_carros` 
        SET `Marca`= '$marca', `Modelo` = '$modelo', `Anio` = $anio, `Estado` = '$estado', `Precio` = $precio, `NumPuertas` = $num_pta, `TipoCombustible` = '$tip_comb', `TipoCarro` = '$tip_carr', `Imagen` = '$ruta_img'
        WHERE `catalogo_carros`.`IDCarro` = $id ";
$query = mysqli_query($con, $sql);
if ($query) {
    header("Location: admin.php");
} else {
    echo "El id ya no es valido";
}
