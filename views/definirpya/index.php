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
<style>
  label{
    display: inline-block !important;
  }
</style>
</head>
<body>
<?php require_once 'views/sidebar.php' ?>
    <div class="content-wrapper">
      <div class="container ml-3 mt-3">  
        <section class="content-header">
        </section>
            <section class ="content">
               <div class="card">
                  <h5 class="card-header">Área</h5>
                    <div class="card-body">
                     <div class = "row">                       
                          <div class="col">
                            <label for="inputreg" >Descripción:</label>  
                          </div> 
                     </div>     
                     <div class = "row">  
                          <div class="col">                                         
                            <input type="text" class="form-control" id="idarea">     
                          </div> 
                          <div class="col">                                   
                            <button type="button" class="btn btn-warning" onclick="guardararea()"><i class="fas fa-save mr-1"></i>GUARDAR</button>
                          </div>
                     </div>
                    </div>
               </div>
            </section>

            <section class ="content">
               <div class="card">
                  <h5 class="card-header">Sub Procesos presentes en el Área</h5>
                    <div class="card-body">
                     <div class = "row">
                        <div class = "col-xs-4">
                          <select class="form-control" id="idproceso" onchange="mostrarsubproceso()" >                          
                          </select>
                        </div>
                        <div class = "col-2">                        
                        </div>
                        <div class = "col-xs-4">
                          <select  class="form-control" id="idareas">                                                     
                          </select>
                        </div>                       
                     </div>  
                     <div class = "row mt-5">
                        <div class="col">
                          <h6>Sub Procesos</h6> 
                        </div>  
                     </div>            
                     <div class = "row">
                        <div class = "col-5">                    
                          <select multiple class="form-control" id="subprocesos">               
                          </select>             
                        </div>   
                        <div class="col">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                            <label class="form-check-label" for="exampleRadios1">
                              Participación Mayor 
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              Participación Menor
                            </label>
                          </div>  
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              Alguna Participación
                            </label>
                          </div> 
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                              Ninguna Participación
                            </label>
                          </div>                       
                        </div>                                         
                     </div>

                     <div class = "row mt-4">
                        <div class = "col">                    
                          <button type="button" class="btn btn-warning" onclick=""><i class="fas fa-save mr-1"></i>GUARDAR</button>
                          <button type="button" class="btn btn-danger" onclick=""><i class="fas fa-times mr-1"></i>CANCELAR</button>         
                        </div>                                                                
                     </div>
                    </div>
               </div>
              </section>

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
        getarea();
        getproceso(); 
       
    });
    

    function guardararea() {
      var des = document.getElementById('idarea').value;
        var url = "http://localhost/procesosem/definirpya/newarea/"
        tem = new FormData();
        tem.append('newarea', des);
        httpRequest_POST(url, tem, function() {
          
        showConfirm('Se registro correctamente');
        
        });

    }

    function getproceso()
     {
      var url = "http://localhost/procesosem/definirpya/getprocesos/"
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

    function getarea()
     {
      var url = "http://localhost/procesosem/definirpya/getareas/"
      httpRequest(url, function()
      {
        console.log(this.responseText);
          var emp = JSON.parse(this.responseText);
          $("#idareas").empty();
          var tabla = $("#idareas");
          for(var de of emp){
            var option='<option value="'+ de.IdArea+'">'+de.Descripcion+'</option>';
            tabla.append(option);
          }
      });
      
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