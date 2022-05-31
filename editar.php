<?php
include("conexion.php");
$con = conectar();
if (mysqli_connect_errno()) {
    echo "Fallo la conexion con MySQL: " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Exoticars.</title>
    <link rel="preload" href="normalize.css" as="style">
    <link rel="stylesheet" href="normalize.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mali:wght@300;600&display=swap" rel="stylesheet">
    <link rel="preload" href="styles.css" as="style">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <?php
    $id = $_GET['id'];
    $todo = mysqli_query($con, "SELECT * FROM `catalogo_carros` WHERE IDCarro = $id");
    $row = mysqli_fetch_array($todo);
    ?>

    <section class="contacto">

        <h2>Productos disponibles.</h2>
        <form class="formulario" action="modificar.php?id=<?php echo $row['IDCarro'] ?>" method="post">
            <fieldset>

                <legend>Desde aqui puede editar la tabla.</legend>

                <div class="contenedor-campos">
                    <div class="campo">
                        <label>Marca<input value="<?php echo $row['Marca']; ?>" class="input-text" type="text" name="marca" placeholder="Ej: Chevrolet" required></label>
                    </div>
                    <div class="campo">
                        <label>Modelo<input value="<?php echo $row['Modelo']; ?>" class="input-text" type="text" name="modelo" placeholder="Ej: Aveo" required></label>
                    </div>
                    <div class="campo">
                        <label>Año<input value="<?php echo $row['Anio']; ?>" class="input-text" type="number" name="anio" placeholder="Ej: 2022" required></label>
                    </div>
                    <div class="campo">
                        <label>Estado<input value="<?php echo $row['Estado']; ?>" class="input-text" type="text" name="estado" placeholder="Ej: Nuevo/Seminuevo/Usado" required></label>
                    </div>
                    <div class="campo">
                        <label>Precio<input value="<?php echo $row['Precio']; ?>" class="input-text" type="number" name="precio" placeholder="149000" required></label>
                    </div>
                    <div class="campo">
                        <label>Numero de puertas<input value="<?php echo $row['NumPuertas']; ?>" class="input-text" type="number" name="num_pta" placeholder="4" required></label>
                    </div>
                    <div class="campo">
                        <label>Tipo de combustible<input value="<?php echo $row['TipoCombustible']; ?>" class="input-text" type="text" name="tip_comb" placeholder="Gasolina/Hibrido/Electrico" list="lista_tipo" required size="64" multiple required></label>
                    </div>
                    <div class="campo">
                        <label>Tipo de carro<input value="<?php echo $row['TipoCarro']; ?>" class="input-text" type="text" name="tip_carr" placeholder="Sedan/Camioneta/etc" required></label>
                    </div>
                    <div class="campo">
                        <label>Ruta imagen<input value="<?php echo $row['Imagen']; ?>" class="input-text" type="text" name="ruta_img" placeholder="img/sedan.jpeg" required></label>
                    </div>
                </div>

                <div class="btn alinear-derecha flex">
                    <input class="boton w-small-100" type="submit" value="Aceptar.">
                </div>

                <datalist id="lista_tipo">
                    <option value="Gasolina"></option>
                    <option value="Hibrido"></option>
                    <option value="Electrico"></option>
                </datalist>
            </fieldset>
        </form>
    </section>
</body>

</html>