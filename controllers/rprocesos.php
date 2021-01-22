<?php
class Rprocesos extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('rprocesos/index');
     }
 }

?>