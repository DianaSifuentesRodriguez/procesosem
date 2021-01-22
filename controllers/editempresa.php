<?php
class Editempresa extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('editempresa/index');
     }
     

     
 }

?>