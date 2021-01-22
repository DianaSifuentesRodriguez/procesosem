<?php
class Editempresauser extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('editempresauser/index');
     }
//traer datos de la empresa
     function getEmpresa($parametro=null){
      $ruc=$parametro[0];
      echo json_encode($this->model->getempresa($ruc));
   }

      //ACTUALIZAR DATOS EMPRESA
      function updateEmpresa($params=null){
        $ruc=$params[0];
        $nomc=$_POST['NombreComercial'];
        $rs=$_POST['RazonSocial'];
        $email=$_POST['Email'];
        $direc=$_POST['Direccion'];
        $tel=$_POST['Telefono'];
        echo $this->model->updateEmpresa(['NombreComercial'=>$email,'RazonSocial'=>$email,'Email'=>$email,'Direccion'=>$direc,
        'Telefono'=>$tel,'Ruc'=>$ruc]);   
       }
     

     
 }

?>