<?php
include("db.php");

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM vehiculo WHERE idVehiculo=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $kilometraje = $row['kilometraje'];
    $anio = $row['anio'];
    $vin = $row['vin'];
    $color = $row['color'];
    $precio = $row['precio'];
  }
}

if (isset($_POST['actualizar'])) {
      $id = $_GET['id'];
      $marca = $_POST['marca'];
      $modelo = $_POST['modelo'];
      $kilometraje = $_POST['kilometraje'];
      $anio = $_POST['anio'];
      $vin = $_POST['vin'];
      $color = $_POST['color'];
      $precio = $_POST['precio'];

  $query = "UPDATE vehiculo set marca = '$marca', modelo = '$modelo', kilometraje = '$kilometraje', anio = '$anio', vin = '$vin', color = '$color', precio = '$precio' WHERE idVehiculo=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="marca" type="text" class="form-control" value="<?php echo $marca; ?>" placeholder="Actualizar marca">
        </div>
        <div class="form-group">
          <input name="modelo" type="text" class="form-control" value="<?php echo $modelo; ?>" placeholder="Actualizar modelo">
        </div>
        <div class="form-group">
          <input name="kilometraje" type="text" class="form-control" value="<?php echo $kilometraje; ?>" placeholder="Actualizar klometraje">
        </div>
        <div class="form-group">
          <input name="anio" type="text" class="form-control" value="<?php echo $anio; ?>" placeholder="Actualizar año">
        </div>
        <div class="form-group">
          <input name="vin" type="text" class="form-control" value="<?php echo $vin; ?>" placeholder="Actualizar vin">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="Actualizar color">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Actualizar precio">
        </div>
        
        <button class="btn-success" name="actualizar">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
