<?php
class Reguser extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('reguser/index');
     }
     //Insertar Uusarios
     function insertUsuario(){
   
      $dni= $_POST['Dni'];
      $nom= $_POST['Nombre'];
      $app= $_POST['Apellidos'];
      $em= $_POST['Email'];
      $dom= $_POST['Domicilio'];
      $tele= $_POST['Telefono'];
      $pass= $_POST['Password'];
      $rol= $_POST['IdRol'];
      $ruc= $_POST['Ruc'];
      
      echo $this->model->insertUsuario(['Nombre'=>$nom,'Apellidos'=>$app,'Dni'=>$dni,'Email'=>$em,'Domicilio'=>$dom,'Telefono'=>$tele,'Password'=>$pass,'IdRol'=>$rol,'Ruc'=>$ruc]);
    }
    //traer descripcion de la ampresa
    function getempresa($params=null)
     {
        $id=$params[0];
        echo json_encode($this->model->getempresa($id));
     }
     //traer descripcion del rol de 
     function getrol()
     {
        echo json_encode($this->model->getrol());
     }
//llevar la vista de editar a listaempresas
   function editarUsuario($parametro=null){
    $this->view->idni = $parametro[0];
    $this->view->render('edituser/index');
 }
 //traer datos del usuario
 function getUsuario($parametro=null){
    $dni=$parametro[0];
    echo json_encode($this->model->getUsuario($dni));
 }
 //actualizar datos del usuario
 function updateUsuario($params=null){
    
    $dni=$params[0];
    $email=$_POST['Email'];
    $dom=$_POST['Domicilio'];
    $tel=$_POST['Telefono'];
    $pas=$_POST['Password'];
    $emp=$_POST['Ruc'];
    $rol=$_POST['IdRol'];

    echo $this->model->updateUsuario(['Email'=>$email,'Domicilio'=>$dom,
    'Telefono'=>$tel, 'Password'=>$pas,'Ruc'=>$emp,'IdRol'=>$rol,'Dni'=>$dni]); 
   }
 }
