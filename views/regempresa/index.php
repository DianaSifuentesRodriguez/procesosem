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
  <?php require_once 'views/sidebar.php' ?>
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
                <input type="tex" class="form-control" id="idruc">
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
            <div class="row mt-4">
              <div class="col">
                <button type="button" class="btn btn-info" onclick="insertEmpresa()">REGISTRAR</button>
                <button type="button" class="btn btn-danger">CANCELAR</button>
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
       
      });

    //Funcion para insertar una empresa
    function insertEmpresa(){
    var ruc = document.getElementById('idruc').value;
    var nomc = document.getElementById('idnomc').value;
    var rsocial = document.getElementById('idrsocial').value;
    var email = document.getElementById('idemail').value;
    var direc = document.getElementById('iddirec').value;
    var tel = document.getElementById('idtel').value;
   
    var validar = validaciones();
    if(validar == 'OK'){
      var fm= new FormData();
    fm.append("Ruc",ruc);
    fm.append("NombreComercial",nomc);
    fm.append("RazonSocial",rsocial);
    fm.append("Email",email);
    fm.append("Direccion",direc);
    fm.append("Telefono",tel);
    var url= "http://localhost/procesosem/regempresa/insertEmpresa/"
    httpRequest_POST(url,fm,function(){
        console.log(this.responseText);
       
    });
    }else{
      alert(validar);
    }
    
}

  function validaciones(){
    var ruc = document.getElementById('idruc').value;
    var nomc = document.getElementById('idnomc').value;
    var rsocial = document.getElementById('idrsocial').value;
    var email = document.getElementById('idemail').value;
    var direc = document.getElementById('iddirec').value;
    var tel = document.getElementById('idtel').value;

    if(ruc.length<11 || ruc.length>11){
      return 'Ruc con formato incorrecto';
    }
    if(nomc==''||rsocial==''||email==''||direc==''||tel==''){
      return 'Existen campos vacios'
    }
    return 'OK';
  }
   
    
  </script>
</body>

</html>