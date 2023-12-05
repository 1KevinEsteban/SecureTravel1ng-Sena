<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
<?php
if (isset($_REQUEST['guardar'])) {
    include_once "dbsecure.php";
    $con = mysqli_connect($host, $user, $pass, $db);
    $id = mysqli_real_escape_string($con, $_REQUEST['idusuario'] ?? '');
    $nombre = mysqli_real_escape_string($con, $_REQUEST['nombres'] ?? '');
    $apellido = mysqli_real_escape_string($con, $_REQUEST['apellidos'] ?? '');
    $email = mysqli_real_escape_string($con, $_REQUEST['correoelectronico'] ?? '');
    $pass = mysqli_real_escape_string($con, $_REQUEST['contraseña'] ?? '');

    $query = "INSERT INTO usuarios
        (idusuario, nombres, apellidos, correoelectronico, contraseña) VALUES
        ('" . $id . "','" . $nombres . "','" . $apellidos . "','". $email ."', '". $pass ."');
        ";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario creado exitosamente" />  ';
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Error al crear usuario <?php echo mysqli_error($con); ?>
        </div>
<?php
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear usuario</h1>
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
                        <form action="panel.php?modulo=crearUsuario" method="post">
                        <div class="form-group">
                                <label>Id usuario</label>
                                <input type="text" name="id" class="form-control">
                            </div>
                        <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" name="apellido" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>contraseña</label>
                                <input type="password" name="pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                            </div>
                        </form>
                    </div>
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