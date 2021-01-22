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
          <h5 class="card-header">Registrar Usuarios</h5>
          <div class="card-body">
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1.5 col-form-label">Nombre:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idnom">
              </div>
              <label for="inputreg" class="col-sm-1.5 col-form-label ml-5">Email:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idem">
              </div>
            </div>
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1.5 col-form-label">Apellidos:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idap">
              </div>
              <label for="inputreg" class="col-sm-1.5 col-form-label ml-5">Domicilio:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="iddom">
              </div>
            </div>
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1 col-form-label">Dni:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="iddni" onkeyup="autocompletado()">
              </div>
              <label for="inputreg" class="col-sm-1.5 col-form-label ml-5">Teléfono:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idtel">
              </div>
            </div>
          </div>
      </section>
      <section class="content">
        <div class="card">
          <h5 class="card-header">Acceso</h5>
          <div class="card-body">
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1.5 col-form-label">Usuario:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idusu" readonly>
              </div>
            </div>
            <div class="form-group row ml-5">
              <label for="inputPassword" class="col-sm-1.5 col-form-label">Contraseña:</label>
              <div class="col-sm-3">
                <input type="password" class="form-control" id="idpass">
              </div>
              <div class="col-sm-1">
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Seleccionar Empresa</label>
                  <select class="form-control" id="idempr">
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Seleccionar Rol</label>
                  <select class="form-control" id="idrol">  
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group row ml-5">
              <div class="col ml-auto">
                <button type="button" class="btn btn-info" onclick="insertUsuario()">REGISTRAR</button>
                <button type="button" class="btn btn-danger">CANCELAR</button>
              </div>
            </div>
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
          getempresa();
          getrol();
           
    });
   
   function insertUsuario() {
      var nom = document.getElementById('idnom').value;
      var ap = document.getElementById('idap').value;
      var dni = document.getElementById('iddni').value;
      var em = document.getElementById('idem').value;
      var dom = document.getElementById('iddom').value;
      var tel = document.getElementById('idtel').value;
      var pass = document.getElementById('idpass').value;
      var tucombo = document.getElementById('idinsertu').value;
      var cboe = document.getElementById('idempr').value;
      
     
      var validar = validaciones();
      if(validar == 'OK'){
      var fm = new FormData();
      fm.append("Nombre", nom);
      fm.append("Apellidos", ap);
      fm.append("Dni", dni);
      fm.append("Email", em);
      fm.append("Domicilio", dom);
      fm.append("Telefono", tel);
      fm.append("Password", pass);
      fm.append("Ruc", cboe);
      fm.append("IdRol", tucombo);
     
      var url = "http://localhost/procesosem/reguser/insertUsuario/"
      httpRequest_POST(url, fm, function() {
     
      });


    }else{
      alert(validar);
    } 
    }

    function autocompletado() {
      var auto = document.getElementById('iddni').value;
      document.getElementById('idusu').value=auto;
      
    }
 
    function validaciones(){
      var nom = document.getElementById('idnom').value;
      var ap = document.getElementById('idap').value;
      var dni = document.getElementById('iddni').value;
      var em = document.getElementById('idem').value;
      var dom = document.getElementById('iddom').value;
      var tel = document.getElementById('idtel').value;
      var pass = document.getElementById('idpass').value;

    if(dni.length<8 || dni.length>8){
      return 'Dni con formato incorrecto';
    }
    if(nom==''||ap==''||em==''||dom==''||tel==''||pass==''){
      return 'Existen campos vacios'
    }
    return 'OK';
  }

  function getempresa()
     {
      var url = "http://localhost/procesosem/reguser/getempresa/"
      httpRequest(url, function()
      {
        console.log(this.responseText);
          var emp = JSON.parse(this.responseText);
          $("#idempr").empty();
          var tabla = $("#idempr");
          for(var de of emp){
            var option='<option value="'+ de.Ruc+'">'+de.NombreComercial+'</option>';
            tabla.append(option);
          }
      });
      
    }

    function getrol()
     {
      var url = "http://localhost/procesosem/reguser/getrol/"
      httpRequest(url, function()
      {
        console.log(this.responseText);
          var emp = JSON.parse(this.responseText);
          $("#idrol").empty();
          var tabla = $("#idrol");
          for(var de of emp){
            var option='<option value="'+ de.IdRol+'">'+de.NombreRol+'</option>';
            tabla.append(option);
          }
      });
      
    }


  </script>
</body>

</html>