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
  <title>Exoticars.</title>
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

  <div class="nav-fijo">
    <div class=iconos-movil>
      <i id="botonMenu" class="fas fa-bars"></i>
    </div>
    <nav class="nav-principal contenedor" id="navPrincipal">
      <a href="index.html">Inicio</a>
      <a href="productos.html">Nuestro catalogo</a>
      <a href="#">Sobre Nosotros</a>
      <a href="contacto.html">Contacto</a>
      <a href="login.html">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <circle cx="12" cy="7" r="4"></circle>
          <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
        </svg>
      </a>
    </nav>
  </div>
  <?php
  function tabla($row)
  {
  ?>

    <section class="nuestro">
      <img src="img/<?php echo $row['Imagen'] ?>" alt="Mi Imagen" title="Mi Imagen">
      <h3><?php echo $row['Marca'] . " " . $row['Modelo'] ?></h3>
      <p>Estado: <?php echo $row['Estado'] ?></p>
      <p>Año: <?php echo $row['Anio'] ?></p>
      <p>Precio: $<?php echo $row['Precio'] ?></p>
      <p>Combustible: <?php echo $row['TipoCombustible'] ?></p>
    </section>

  <?php
  }
  if (isset($_POST['todo'])) {
    $todo = mysqli_query($con, "SELECT * FROM `catalogo_carros`");
  ?>
    <main class="contenedor sombra animate__animated animate__slideInRight">
      <h2>Todos nuestros productos que ofrecemos.</h2>
      <div class="btn alinear-centro flex">
        <div class="nuestro-cafe">
          <?php while ($row = mysqli_fetch_array($todo)) tabla($row); ?>
        </div>
      </div>
      <div class="btn alinear-derecha flex">
        <form action="productos.html" method="post">
          <input class="boton w-small-100" type="submit" name="regresa" value="Regresar.">
        </form>
      </div>
    </main>
  <?php
  }
  
  <?php
  mysqli_close($con);
  ?>
</body>

</html>