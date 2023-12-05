<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id Usuario</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Email</th>
                  <th>Acciones
                  <a href="panel.php?modulo=crearusuario"> <i class="fa fa-plus" aria-hidden="true"></i></a>
                  </th>
                </tr>
                </thead>
                <?php
                include_once "dbsecure.php";
                $con = mysqli_connect($host, $user, $pass, $db);
                $query = "SELECT idusuario, correoelectronico, nombres, apellidos FROM usuarios";
                $result = mysqli_query($con, $query);


                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                  <td><?php echo $row['idusuario'] ?></td>
                  <td><?php echo $row['nombres'] ?></td>
                  <td><?php echo $row['apellidos'] ?></td>
                  <td><?php echo $row['correoelectronico'] ?></td>
                  <td>
                      <a href="editarusuario.php?id=<?php echo $row['idusuario'] ?>" style="margin-right: 5px;"> <i class="fas fa-edit"> </i> </a>
                      <a href="usuarios.php?idborrar=<?php echo $row['idusuario'] ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                }
                ?>
                <tbody>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>