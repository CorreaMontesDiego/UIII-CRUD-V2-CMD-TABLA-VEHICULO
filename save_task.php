<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $kilometraje = $_POST['kilometraje'];
  $anio = $_POST['anio'];
  $vin = $_POST['vin'];
  $color = $_POST['color'];
  $precio = $_POST['precio'];
  $query = "INSERT INTO vehiculo(marca, modelo, kilometraje, anio, vin, color, precio) VALUES ('$marca', '$modelo', '$kilometraje', '$anio', '$vin', '$color','$precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
