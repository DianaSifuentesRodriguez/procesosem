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
          <h5 class="card-header">Editar Perfil</h5>
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
          <h5 class="card-header">Cambiar contraseña</h5>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContraseña">Cambiar contraseña</button>
              </div>
              <div class="col-sm-1">
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
        <div class="modal fade" id="modalContraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span> 
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Anterior contraseña</label>
                    <input type="password" class="form-control" id="contraseña">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" id="contraseña_repet">
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="asignarPassword()">Asignar</button>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>

      $(document).ready(function() {   
        getUsuario();
       
    });
    function mostrarError(mensaje){
            Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: mensaje
        
      })
    }
    function success(mensaje){
      Swal.fire({
            icon: 'success',
            title: mensaje,
            showConfirmButton: false
            })
    }
    function getUsuario() {
      var url = "http://localhost/procesosem/editmiuser/getUsuario";

      httpRequest(url, function() {
        var inus = JSON.parse(this.responseText);
        document.getElementById('idnom').value = inus.Nombre;
        document.getElementById('idap').value = inus.Apellidos;
        document.getElementById('iddni').value = inus.Dni;
        document.getElementById('idem').value = inus.Email;
        document.getElementById('iddom').value = inus.Domicilio;
        document.getElementById('idtel').value = inus.Telefono;
        document.getElementById('idusu').value = inus.Dni;
      
      });
    }
    function updateUsuario() {

      var em = document.getElementById('idem').value;
      var dom = document.getElementById('iddom').value;
      var tel = document.getElementById('idtel').value;
      var fm = new FormData();
      fm.append("Email", em);
      fm.append("Domicilio", dom);
      fm.append("Telefono", tel);
      
      var url = "http://localhost/procesosem/editmiuser/updateUsuario/";
      httpRequest_POST(url, fm, function() {
        console.log(this.responseText);
        if(this.responseText=='ok'){
          success("La información se ha editado correctamente");
          getUsuario();
        }
        else{
          mostrarError('Ha ocurrido un problema');
        }
       
        
      });
    }
    function asignarPassword() {
            var contraseña_curren = document.getElementById('contraseña').value;
            var contraseña_new = document.getElementById('contraseña_repet').value;
            let url = "http://localhost/procesosem/editmiuser/updatePassword";
            let fm = new FormData();
            fm.append('current_password', contraseña_curren);
            fm.append('new_password', contraseña_new);
            httpRequest_POST(url, fm, function() {
                console.log(this.responseText);
                if(this.responseText=='01'){
                  $('#modalContraseña').modal('hide');
                  success('La contraseña se ha editado correctamente')
                  
                }else{
                  mostrarError('La contraseña ingresada no es válida')
                }
            })
            
            
    }
  
  
  </script>
</body>

</html>