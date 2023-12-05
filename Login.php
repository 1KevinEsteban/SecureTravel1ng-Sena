<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Iniciar sesion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Iniciar sesion</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar sesion para comezar</p>
      <?php
      session_start(); // Inicia la sesión

      if (isset($_POST['login'])) {
          $email = $_POST['correoelectronico'] ?? '';
          $password = $_POST['contraseña'] ?? '';
          include_once "dbsecure.php"; // Incluye tu archivo de configuración de la base de datos

          // Realiza la conexión
          $con = mysqli_connect($host, $user, $pass, $db);

          if ($con) {
              $query = "SELECT idusuario, contraseña FROM usuarios WHERE correoelectronico = '$email'";
              $result = mysqli_query($con, $query);

              if ($result && mysqli_num_rows($result) > 0) {
                  $row = mysqli_fetch_assoc($result);
                  $stored_password = $row['contraseña'];

                  // Verifica la contraseña
                  if ($password === $stored_password) {
                      // Credenciales correctas - Inicia sesión y redirecciona
                      $_SESSION['idusuario'] = $row['idusuario']; // Guarda el ID de usuario en la sesión
                      header("Location: panel.php");
                      exit();
                  } else {
                      // Contraseña incorrecta - Muestra la alerta
                      echo "<script>alert('Credenciales incorrectas');</script>";
                  }
              } else {
                  // El correo electrónico no está registrado - Muestra la alerta
                  echo "<script>alert('Correo electrónico no registrado');</script>";
              }
          } else {
              // Error de conexión a la base de datos - Muestra la alerta
              die("<script>alert('Conexión fallida: " . mysqli_connect_error() . "');</script>");
          }

          mysqli_close($con);
      }
      ?>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="correoelectronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- = -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Usar Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Usar Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Olvitaste tu contraseña</a>
      </p>
      <p class="mb-0">
        <a href="RegistroUsuario.php" class="text-center">Registrate </a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
