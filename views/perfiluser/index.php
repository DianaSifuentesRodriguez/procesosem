<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
  <?php require_once 'views/sidebaruser.php' ?>
  <div class="content-wrapper">
    <div class="container ml-3 mt-3">
      <section class="content-header">
      </section>
      <section class="content">
        <div class="card">
          <h5 class="card-header">Mi Perfil</h5>
          <div class="card-body ml-5 mr-5">
            <div class="row ml-3">
              <div class="col-1">
                <label for="inputreg">Nombre:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="nom" readonly="true">
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="col-1">
                <label for="inputreg">Apellidos:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="ap" readonly="true">                
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="col-1">
                <label for="inputreg">Dni:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="dni" readonly="true">
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="col-1">
                <label for="inputreg">Email:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="em" readonly="true">
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="col-1">
                <label for="inputreg">Direccion:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="dir" readonly="true">
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="col-1">
                <label for="inputreg">Telefono:</label>
              </div>
              <div class="col-4">
              <input type="tex" class="form-control" id="tel" readonly="true">
              </div>
            </div>
            <div class="row ml-3 d-flex">
              <a href="<?php echo constant('URL'); ?>editmiuser" class="ml-auto mr-4 btn btn-success"><i class="far fa-edit mr-1"></i>EDITAR </a>
            </div>
          </div>
      </section>
    </div>
  </div>

  <script src="<?php echo constant('URL'); ?>public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo constant('URL'); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo constant('URL'); ?>public/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo constant('URL'); ?>public/dist/js/demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="<?php echo constant('URL'); ?>public/dist/js/function.js"></script>
  <script>
    
     $(document).ready(function() {   
      getUsuario();   
    });
   
      function getUsuario() {
      var url = "http://localhost/procesosem/perfiluser/getUsuario";

      httpRequest(url, function() {
        var inus = JSON.parse(this.responseText);
        document.getElementById('nom').value = inus.Nombre;
        document.getElementById('ap').value = inus.Apellidos;
        document.getElementById('dni').value = inus.Dni;
        document.getElementById('em').value = inus.Email;
        document.getElementById('dir').value = inus.Domicilio;
        document.getElementById('tel').value = inus.Telefono;

      });
    
    }
    


  </script>
</body>

</html>