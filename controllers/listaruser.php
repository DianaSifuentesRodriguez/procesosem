<?php
class Listaruser extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('listaruser/index');
     }
     function getUsuario(){
        echo json_encode($this->model->getUsuario());
     }
 }
