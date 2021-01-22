<?php
class Iniciodos extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('iniciodos/index');
     }
 }

?>