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
          <h5 class="card-header">Procesos y Sub Procesos de la Empresa</h5>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-success" onclick="newproceso()"><i class="fa fa-plus mr-1"></i></button>
                <button type="button" class="btn btn-warning" onclick="editproceso()"><i class="fa fa-edit mr-1"></i></button>
                <button type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i></button>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-3">
                <h5>Procesos</h5>
                <select class="form-control" id="idproceso" onchange="mostrarsubproceso()">
                </select>
              </div>
              <div class="col-6">
                <h5>Sub Procesos</h5>
                <select multiple class="form-control" id="subprocesos">
                </select>
              </div>
            </div> 
            
            <div class="row mt-4">
              <div class="col-7">
              </div>
              <div class="col">
                <button type="button" class="btn btn-success" onclick="newsubproceso()"><i class="fa fa-plus mr-1"></i></button>
                <button type="button" class="btn btn-warning" onclick="editsubproceso()"><i class="fa fa-edit mr-1"></i></button>
                <button type="button" class="btn btn-danger"><i class="fa fa-trash mr-1"></i></button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="newp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Procesos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Proceso</label>
                    <input type="text" class="form-control" id="proceso">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarproceso()">Guardar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="news" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub Procesos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Sub Proceso</label>
                    <input type="text" class="form-control" id="editproceso">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="guardarsubproceso()">Guardar</button>
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
      getproceso();
           
    });
    var editproceso;
    var editsubproceso


    function newproceso() {
      editproceso = 0;
      showModal('newp')
    }

    function newsubproceso() {
      editsubproceso = 0;
      showModal('news')
    }

    function guardarproceso() {
      var des = document.getElementById('proceso').value;

      if (editproceso == 0) {
        var url = "http://localhost/procesosem/rproysub/newproceso/"
        tem = new FormData();
        tem.append('np', des);
        httpRequest_POST(url, tem, function() {
        getproceso();
        showConfirm('nbeb');
        closeModal('newp');
        });

      }else {
        var id = document.getElementById('idproceso').value;
        var url = "http://localhost/procesosem/rproysub/updateProcesos/"
        tem = new FormData();
        tem.append('idp', id);
        tem.append('des', des);
        httpRequest_POST(url, tem, function() {
        getproceso();
        showConfirm('nbeb');
        closeModal('newp');
        });

      }

    }

    function getproceso()
     {
      var url = "http://localhost/procesosem/rproysub/getprocesos/"
      httpRequest(url, function()
      {
        console.log(this.responseText);
          var emp = JSON.parse(this.responseText);
          $("#idproceso").empty();
          var tabla = $("#idproceso");
          for(var de of emp){
            var option='<option value="'+ de.IdProceso+'">'+de.Descripcion+'</option>';
            tabla.append(option);
          }
      });
      
    }
    function editproceso() {
      editproceso = 1;
      showModal('newp');
      document.getElementById('proceso').value=$('#idproceso option').innerHTML;
    }

    function mostrarsubproceso()
    {
      let id = document.getElementById('idproceso').value;
      
      let url = "http://localhost/procesosem/rproysub/getsubprocesos/" + id;
      httpRequest(url, function() {
        console.log(this.responseText);
        var emp = JSON.parse(this.responseText);
        var tabla = $("#subprocesos");
        $("#subprocesos").empty();
        for (var item of emp) {
          var option='<option value="'+ item.IdSub+'">'+item.Descripcion+'</option>';
          tabla.append(option);
        }
       
      })
    }

  </script>
</body>

</html>