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
          <h5 class="card-header">Procesos de la Empresa</h5>
          <div class="card-body ml-5 mr-5">
                     <div class = "row ml-3">
                         <div class = "col-2">
                          <label for="inputreg" >Leyenda:</label>
                         </div>
                         <div class = "col-3">
                         <h6>X : Responsabilidad Mayor.</h6>
                         </div>
                     </div>  
                     <div class = "row ml-3">
                         <div class = "col-2">
                         </div>
                         <div class = "col-5">
                         <p id="ruc">C : Participación Mayor en el Proceso.</p>   
                         </div>
                     </div>  
                     <div class = "row ml-3">
                         <div class = "col-2">
                         </div>
                         <div class = "col-5">
                         <p id="ruc">/ : Alguna participación en el Proceso</p>   
                         </div>
                     </div>    
          </div>
          <div class="card-body ml-5 mr-5">
               <div class = "row ml-3">
                  <div class = "col-4">
                  </div>
                  <div class = "col-6 ml-5">
                  <label for="inputreg" >ORGANIZACIÓN</label>   
                  </div>
               </div> 
          </div>
          <div class="card-body ml-5 mr-5">
               <div class = "row ml-3">
                  <div class = "col-2">
                    <h6>Procesos</h6>
                  </div>
                  <div class = "col-2">
                    <h6>Subprocesos</h6>
                  </div>
                  <div class = "col-1">
                  <h6>Gerencia</h6>
                  </div>
                  <div class = "col-1">
                  <h6>Ventas</h6>
                  </div>
                  <div class = "col-1">
                  <h6>Logistica</h6>
                  </div>
                  <div class = "col-1">
                  <h6>Finanzas</h6>
                  </div>
                  <div class = "col-1">
                  <h6>RRHH</h6>
                  </div>
                  <div class = "col-1">
                  <h6>Almacen</h6>
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
    <script>
        <?php
            if((isset($_GET['error']))){
            ?>
                error();
            <?php }
        ?>
        function error(){
                alert("hiad");            
        }
    </script>
</body>

</html>