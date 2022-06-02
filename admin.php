<?php
/*
  *Contraseñas xd
  localhost@root: 080900
  localhost@general: 0000
  localhost@Lupita: lupita
*/
session_start();
if (!isset($_SESSION['nombre'])) {
  echo '<script> alert("Debes de iniciar sesion primero."); window.location.href="login.html"; </script>';
  //header('location: login.html');
}
?>
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
  <title>Adminstrar - Exoticars.</title>
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
  function tabla($row)
  {
  ?>

    <tr>
      <td><?php echo $row['IDCarro']; ?></td>
      <td><?php echo $row['Marca']; ?></td>
      <td><?php echo $row['Modelo']; ?></td>
      <td><?php echo $row['Anio']; ?></td>
      <td><?php echo $row['Estado']; ?></td>
      <td><?php echo $row['Precio']; ?></td>
      <td><?php echo $row['NumPuertas']; ?></td>
      <td><?php echo $row['TipoCombustible']; ?></td>
      <td><?php echo $row['TipoCarro']; ?></td>
      <td><?php echo $row['Imagen']; ?></td>
      <td>
        <a class="btn-admin" href="eliminar.php?id=<?php echo $row['IDCarro'] ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="18" height="18" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="4" y1="7" x2="20" y2="7"></line>
            <line x1="10" y1="11" x2="10" y2="17"></line>
            <line x1="14" y1="11" x2="14" y2="17"></line>
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
          </svg>
        </a>
      </td>
      <td>
        <a class="btn-admin" href="editar.php?id=<?php echo $row['IDCarro'] ?>">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="18" height="18" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
            <path d="M16 5l3 3"></path>
          </svg>
        </a>
      </td>
    </tr>
  <?php
  }
  $todo = mysqli_query($con, "SELECT * FROM `catalogo_carros`");
  ?>

  <section class="contacto">

    <h2>Productos disponibles.</h2>
    <form class="formulario" action="anadir.php" method="post">
      <fieldset>

        <legend>Desde aqui puede editar la tabla.</legend>

        <div class="contenedor-campos">
          <div class="campo">
            <label>Marca<input class="input-text" type="text" name="marca" placeholder="Ej: Chevrolet" required></label>
          </div>
          <div class="campo">
            <label>Modelo<input class="input-text" type="text" name="modelo" placeholder="Ej: Aveo" required></label>
          </div>
          <div class="campo">
            <label>Año<input class="input-text" type="number" name="anio" placeholder="Ej: 2022" required></label>
          </div>
          <div class="campo">
            <label>Estado<input class="input-text" type="text" name="estado" placeholder="Ej: Nuevo/Seminuevo/Usado" required></label>
          </div>
          <div class="campo">
            <label>Precio<input class="input-text" type="number" name="precio" placeholder="149000" required></label>
          </div>
          <div class="campo">
            <label>Numero de puertas<input class="input-text" type="number" name="num_pta" placeholder="4" required></label>
          </div>
          <div class="campo">
            <label>Tipo de combustible<input class="input-text" type="text" name="tip_comb" placeholder="Gasolina/Hibrido/Electrico" list="lista_tipo" required size="64" multiple required></label>
          </div>
          <div class="campo">
            <label>Tipo de carro<input class="input-text" type="text" name="tip_carr" placeholder="Sedan/Camioneta/etc" required></label>
          </div>
          <div class="campo">
            <label>Nombre de la imagen<input class="input-text" type="text" name="ruta_img" placeholder="sedan.jpeg" required></label>
          </div>
        </div>

        <div class="btn alinear-derecha flex">
          <input class="boton w-small-100" type="submit" value="Añadir.">
        </div>

        <datalist id="lista_tipo">
          <option value="Gasolina"></option>
          <option value="Hibrido"></option>
          <option value="Electrico"></option>
        </datalist>
      </fieldset>
    </form>
  </section>

  <br>
  <h3>Tabla de productos actuales</h3>
  <br>
  <table class="tabla-admin" border='1'>
    <tr>
      <th>ID</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Año</th>
      <th>Estado</th>
      <th>Precio</th>
      <th>Puertas</th>
      <th>Combustible</th>
      <th>Tipo</th>
      <th>Imagen</th>
      <th>Eliminar</th>
      <th>Editar</th>
    </tr>
    <div>
      <?php while ($row = mysqli_fetch_array($todo)) tabla($row); ?>
    </div>
  </table>

  <footer class="footer">
    <p>No hay mas elemenos.</p>
  </footer>

</body>

</html>