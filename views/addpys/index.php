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
          <h5 class="card-header">Agregar Procesos y Sub Procesos de Organización</h5>
          <div class="card-body">
            <div class="row ml-3">
              <div class="col-1 mt-2">
                <label for="inputreg">Proceso:</label>
              </div>
              <div class="col-3">
                <input type="tex" class="form-control" id="idproceso">
              </div>
            </div>
            <div class="row ml-3 mt-3">
              <div class="mt-2">
                <label for="inputreg">Sub Proceso:</label>
              </div>
              <div class="col-5">
                <input type="tex" class="form-control" id="idsubp">
              </div>
              <div class="col-5">
                <button type="button" class="btn btn-secondary active" onclick="guardarsubp()">Agregar</button>
              </div>
            </div>
            <div class="row ml-3 mt-4">
              <div class="col-1 mt-2">
              </div>
              <div class="col-3">
                <label for="inputreg">Lista de Sub Procesos presentes</label>
              </div>
            </div>
            <div class="row ml-3 mt-4">
              <div class="col-1 mt-2">
              </div>
              <div class="col-6">
                <select multiple class="form-control" id="listasubp"></select>
              </div>
              <div class="col-2 mt-3">
                <button type="button" class="btn btn-warning" onclick="editarsubp()"><i class="fas fa-edit"></i>Editar</button>
              </div>
            </div>
            <div class="row ml-3 mt-4">
              <div class="col-1 mt-2">
              </div>
              <div class="col-6">
                 <textarea class="form-control" id="editsubp" rows="2"></textarea>
              </div>
            </div>
            <div class="row ml-3 mt-4">
              <div class="col-10 mt-2">
              </div>
              <div class="col-2">
                <button type="button" class="btn btn-primary" onclick="insertarp()"><i class="fas fa-save"></i> GUARDAR</button>
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

function insertarp()
{
    var id = document.getElementById('ideproceso').value;
    var ide = document.getElementById('idsub').value;
  
    var validar = validaciones();
    if(validar == 'OK'){
      var fm= new FormData();
    fm.append("Descripcion",id);
    fm.append("Descripcion",ide);

    var url= "http://localhost/procesosem/addpys/insertarp/"
    httpRequest(url,fm,function(){
        console.log(this.responseText);
        
        showSave();
    });
    }else{
      alert(validar);
    }

    function httpRequest(url,fm,);

function showSave() {
     Swal.fire({
            icon: 'success',
            title: 'EL REGISTRO SE GUARDO CORRECTAMENTE',
            showConfirmButton: false
            })
                     
    }
function guardarsubp()
{
  var tablex=document.getElementById('listasubp');
}

}
</script>

</body>

</html>