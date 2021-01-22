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
          <h5 class="card-header">Editar Usuarios <i class="fas fa-edit"></i></h5>
          <div class="card-body">
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1.5 col-form-label">Nombre:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idnom" readonly="true">
              </div>
              <label for="inputreg" class="col-sm-1.5 col-form-label ml-5">Email:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idem">
              </div>
            </div>
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1.5 col-form-label">Apellidos:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="idap" readonly="true">
              </div>
              <label for="inputreg" class="col-sm-1.5 col-form-label ml-5">Domicilio:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="iddom">
              </div>
            </div>
            <div class="form-group row ml-5">
              <label for="inputreg" class="col-sm-1 col-form-label">Dni:</label>
              <div class="col-sm-3">
                <input type="tex" class="form-control" id="iddni" onkeyup="autocompletado()" readonly="true">
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
                <input type="Password" class="form-control" id="idpass">
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
                  <select class="form-control" id="idinsertu">
                    
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row ml-5">
            <div class="col ml-auto">
              <button type="button" class="btn btn-info" onclick="updateUsuario()">GUARDAR CAMBIOS</button>
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
    const dni = <?php echo $this->idni; ?>;
      $(document).ready(function() {   
        getUsuario();
        getempresa();
        getrol();
    });
    
    function getUsuario() {
      var url = "http://localhost/procesosem/reguser/getUsuario/"+dni;

      httpRequest(url,function(){
        var inus=JSON.parse(this.responseText);
        document.getElementById('idnom').value=inus.Nombre;
        document.getElementById('idap').value=inus.Apellidos;
        document.getElementById('iddni').value=inus.Dni;
        document.getElementById('idem').value=inus.Email;
        document.getElementById('iddom').value=inus.Domicilio;
        document.getElementById('idtel').value=inus.Telefono;
        document.getElementById('idpass').value=inus.Password;
        document.getElementById('idempr').value=inus.Ruc;
        document.getElementById('idinsertu').value=inus.IdRol; 
        document.getElementById('idusu').value=inus.Dni; 
      
    });
    }
    function updateUsuario(){
    var em = document.getElementById('idem').value;
    var dom = document.getElementById('iddom').value;
    var tel = document.getElementById('idtel').value;
    var pa = document.getElementById('idpass').value;
    var emp = document.getElementById('idempr').value;
    var rol = document.getElementById('idinsertu').value;

    var fm= new FormData();
    fm.append("Email",em);
    fm.append("Domicilio",dom);
    fm.append("Telefono",tel);
    fm.append("Password",pa);
    fm.append("Ruc",emp);
    fm.append("IdRol",rol);
    var url = "http://localhost/procesosem/reguser/updateUsuario/"+dni;
    httpRequest_POST(url,fm,function(){
        console.log(this.responseText);
    });
    }

    function getempresa()
     {
      var url = "http://localhost/procesosem/edituser/getempresa/"
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
      var url = "http://localhost/procesosem/edituser/getrol/"
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