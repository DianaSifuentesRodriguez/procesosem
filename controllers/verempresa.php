<?php
class Verempresa extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('verempresa/index');
     }

     function getEmpresa($parametro=null){
        $ruc=$parametro[0];
        echo json_encode($this->model->getEmpresa($ruc));
     }
 }

?>