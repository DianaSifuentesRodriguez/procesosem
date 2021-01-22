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
          <h5 class="card-header">Listar Usuarios</h5>
          <div class="card-body">
            <div class="row ">
              <div class="col-4 input-group">  
              </div>
            </div>
            <table class="table" id="lista_usuario">
              <thead>
                <tr>
                  <th scope="col">NOMBRES</th>
                  <th scope="col">APELLIDOS</th>
                  <th scope="col">DNI</th>
                  <th scope="col">EMAIL</th>
                  <th scope="col">DOMICILIO</th>
                  <th scope="col">TELEFONO</th>
                  <th scope="col">OPCIONES</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
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
    function getUsuario() {
      var url = "http://localhost/procesosem/listaruser/getUsuario/";
      httpRequest(url, function() {
        var us = JSON.parse(this.responseText);
        var tabla = $("#lista_usuario tbody");
        for (var item of us) {
          var tr = '<tr>';
          tr = tr + '<td>' + item.Nombre + '</td>';
          tr = tr + '<td>' + item.Apellidos + '</td>';
          tr = tr + '<td>' + item.Dni + '</td>';
          tr = tr + '<td>' + item.Email + '</td>';
          tr = tr + '<td>' + item.Domicilio + '</td>';
          tr = tr + '<td>' + item.Telefono + '</td>';
          var dni = "<?php echo constant('URL').'reguser/editarusuario/'; ?>" + item.Dni;
          //ultimos 3
          tr = tr + '<td><a href="' + dni + '"class="btn btn-warning">EDITAR</a></td>';
          tabla.append(tr);
        }
      })
    }
    getUsuario();
  </script>
</body>

</html>