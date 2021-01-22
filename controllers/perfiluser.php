<?php
class Perfiluser extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
    
     function render(){
        $this->view->render('perfiluser/index');
     }

     function getUsuario($parametro=null){
        $dni=$parametro[0];
        echo json_encode($this->model->getUsuario($dni));
     }
 }

?>