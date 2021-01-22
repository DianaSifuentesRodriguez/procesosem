<?php
class Edituser extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('edituser/index');
     }
     function getempresa($params=null)
     {
        $id=$params[0];
        echo json_encode($this->model->getempresa($id));
     }
     //traer descripcion del rol de 
     function getrol($params=null)
     {
         $id=$params[0];
        echo json_encode($this->model->getrol($id));
     }
 }

?>