<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="marca" class="form-control" placeholder="Marca" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="kilometraje" class="form-control" placeholder="Kilometraje" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="anio" class="form-control" placeholder="Año" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="vin" class="form-control" placeholder="Vin" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="color" class="form-control" placeholder="Color" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="precio" class="form-control" placeholder="Precio" autofocus>
          </div>
          
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Kilometraje</th>
            <th>Año</th>
            <th>Vin</th>
            <th>Color</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM vehiculo";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['idVehiculo']; ?></td>
            <td><?php echo $row['marca']; ?></td>
            <td><?php echo $row['modelo']; ?></td>
            <td><?php echo $row['kilometraje']; ?></td>
            <td><?php echo $row['anio']; ?></td>
            <td><?php echo $row['vin']; ?></td>
            <td><?php echo $row['color']; ?></td>
            <td><?php echo $row['precio']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['idVehiculo']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['idVehiculo']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
