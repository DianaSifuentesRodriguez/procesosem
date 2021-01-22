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
            <section class ="content">
               <div class="card">
                  <h5 class="card-header">Ver Empresa</h5>
                    <div class="card-body ml-5 mr-5">
                     <div class = "row ml-3 mt-3">
                         <div class = "col-2">
                          <label for="inputreg" >Ruc:</label>
                         </div>
                         <div class = "col-5">
                         <input type="tex" class="form-control" id="ruc" readonly="true">   
                         </div>
                     </div>
                     <div class = "row ml-3 mt-3">
                         <div class = "col-2">
                          <label for="inputreg" >Nombre Comercial:</label>
                         </div>
                         <div class = "col-5">
                         <input type="tex" class="form-control" id="nomc" readonly="true">   
                         </div>
                     </div>
                     <div class = "row ml-3 mt-3">
                         <div class = "col-2">
                          <label for="inputreg" >Razón Social:</label>
                         </div>
                         <div class = "col-5">
                         <input type="tex" class="form-control" id="rs" readonly="true">                         
                         </div>
                     </div>
                     <div class = "row ml-3 mt-3">
                         <div class = "col-2">
                          <label for="inputreg" >Email:</label>
                         </div>
                         <div class = "col-5">
                         <input type="tex" class="form-control" id="em" readonly="true">    
                         </div>
                     </div>
                     <div class = "row ml-3 mt-3">
                         <div class = "col-2">
                          <label for="inputreg" >Direccion:</label>
                         </div>
                         <div class = "col-5">
                         <input type="tex" class="form-control" id="di" readonly="true">   
                         </div>
                     </div>
                    <div class = "row ml-3 mt-3">
                        <div class = "col-8">
                        </div>
                        <div class = "col-2">
                         <a href="<?php echo constant('URL');?>rprocesos" class="ml-auto mr-4 btn btn-primary"><i class="far fa-eye mr-1"></i>PROCESOS</a>  
                         </div>
                        <div class = "col-2">  
                         <a href="<?php echo constant('URL');?>editempresauser" class="ml-auto mr-4 btn btn-warning"><i class="far fa-edit mr-1"></i>EMPRESA</a> 
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
      getEmpresa();   
    });
   
      function getEmpresa() {
      var url = "http://localhost/procesosem/verempresa/getEmpresa";

      httpRequest(url, function() {
        var inus = JSON.parse(this.responseText);
        document.getElementById('ruc').value = inus.Ruc;
        document.getElementById('nomc').value = inus.NombreComercial;
        document.getElementById('rs').value = inus.RazonSocial;
        document.getElementById('em').value = inus.Email;
        document.getElementById('di').value = inus.Direccion;
      

      });
    
    }
    
     
    </script>
</body>

</html>