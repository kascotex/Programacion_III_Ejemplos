<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Principal</title>
</head>

<body>
  <?php
  session_start();
  require_once("./accesoDatos.php");
  require_once("./alumno.php");

  
  if (
    isset($_SESSION["legajo"]) && isset($_SESSION["nombre"]) &&
    isset($_SESSION["apellido"]) && isset($_SESSION["foto"])
  ) {
    $legajo = $_SESSION["legajo"];
    $nombre = $_SESSION["nombre"];
    $apellido = $_SESSION["apellido"];
    $foto = $_SESSION["foto"];

    echo "<h1>Legajo: " . $legajo . "</h1>";
    echo "<h2>Nombre: " . $nombre . "</h2>";
    echo "<h2>Apellido: " . $apellido . "</h2>";
    echo "<img src='" . $foto . "' width=150px><br><br>";

    $alumnos = Alumno::listar();

    echo "<table>";
    echo "<thead>";
    echo "<th>Legajo</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Foto</th>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($alumnos as $alumno) {
      echo "<tr>";
      foreach ($alumno as $key => $value) {
        if ($key == "foto") {
          echo "<td><img src='" . $value . "' width=25px></td>";
        } else {
          echo "<td>" . $value . "</td>";
        }
      }
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
  } else {
    header("location: nexo.php");
  }
  // session_destroy();
  // http://localhost/Programacion-III/Clase%204/ejercicio%20clase/nexo.php?accion=7&legajo=1000
  ?>
</body>

</html>