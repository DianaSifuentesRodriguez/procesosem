<?php
class Regempresa extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('regempresa/index');
     }
     function editarempresa($parametro=null){
      $this->view->rucem = $parametro[0];
      $this->view->render('editempresa/index');
     } 

     function insertEmpresa(){
        //variables
        $ruc=$_POST['Ruc'];
        $nomc=$_POST['NombreComercial'];
        $rsocial=$_POST['RazonSocial'];
        $email=$_POST['Email'];
        $direc=$_POST['Direccion'];
        $tel=$_POST['Telefono'];

        echo $this->model->insertEmpresa(['Ruc'=>$ruc,'NombreComercial'=>$nomc,
        'RazonSocial'=>$rsocial,'Email'=>$email,'Direccion'=>$direc,'Telefono'=>$tel]); 

    }
    //FUNCION DE EDITAR EMPRESA TRAER DATOS
    function getempresa($parametro=null){
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
