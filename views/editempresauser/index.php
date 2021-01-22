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
          <h5 class="card-header">Registrar Empresas</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Ruc:</label>
              </div>
              <div class="col-2">
                <input type="tex" class="form-control" id="idruc" readonly="true">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Nombre Comercial:</label>
              </div>
              <div class="col-3">
                <input type="tex" class="form-control" id="idnomc">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Razón Social:</label>
              </div>
              <div class="col-4">
                <input type="tex" class="form-control" id="idrsocial">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Email:</label>
              </div>
              <div class="col-4">
                <input type="tex" class="form-control" id="idemail">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Teléfono:</label>
              </div>
              <div class="col-2">
                <input type="tex" class="form-control" id="idtel">
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-1">
                <label for="inputreg" class="col-form-label">Dirección:</label>
              </div>
              <div class="col-3">
                <input type="tex" class="form-control" id="iddirec">
              </div>
            </div>
            <div class="form-group row ml-5 mt-5">
              <div class="col-sm-4 col-md-4 col-lg-15 text-center">
                <button type="button" class="btn btn-info" onclick="updateEmpresa()">GUARDAR CAMBIOS</button>
                <button type="button" class="btn btn-danger">CANCELAR</button>
              </div>
            </div>
      </section>
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
        const ruc = <?php echo $this->rucem; ?>;
        $(document).ready(function() {
          getEmpresa();
        });
          //Traer los datos de la empresa
        function getEmpresa() {
          var url = "http://localhost/procesosem/editempresauser/getEmpresa/"+ruc;
          httpRequest(url, function() {
            var infog = JSON.parse(this.responseText);
            document.getElementById('idruc').value = infog.Ruc;
            document.getElementById('idnomc').value = infog.NombreComercial;
            document.getElementById('idrsocial').value = infog.RazonSocial;
            document.getElementById('idemail').value = infog.Email;
            document.getElementById('iddirec').value = infog.Direccion;
            document.getElementById('idtel').value = infog.Telefono;
          
          });
        }
        //actualizar los datos de la empresa
        function updateEmpresa() {
          var nomc = document.getElementById('idnomc').value;
          var rs = document.getElementById('idrsocial').value;
          var email = document.getElementById('idemail').value;
          var direc = document.getElementById('iddirec').value;
          var tel = document.getElementById('idtel').value;
          
          var fm = new FormData();

          fm.append("NombreComercial", nomc); 
          fm.append("RazonSocial", rs); 
          fm.append("Email", email);    
          fm.append("Direccion", direc);    
          fm.append("Telefono", tel);
          
          var url = "http://localhost/procesosem/editempresauser/updateEmpresa/" + ruc;
          httpRequest_POST(url, fm, function() {
            console.log(this.responseText);
          });
        }
      </script>
</body>

</html>