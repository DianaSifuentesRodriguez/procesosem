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
            <section class ="content">
               <div class="card">
                  <h5 class="card-header">Principal</h5>
                    <div class="card-body">
                     <div class = "row">
                         <div class = "col">
                            <h5>Disfruta de una experiencia unica</h5>
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