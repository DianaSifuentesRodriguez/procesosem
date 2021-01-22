<?php
class Definirpya extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('definirpya/index');
     }
     function newarea()
     {
        $pro=$this->getPost('newarea');
        echo $this->model->newareas($pro);

     }
     function getprocesos()
     {
        echo json_encode($this->model->getprocesos());
     }
     function getareas()
     {
        echo json_encode($this->model->getareas());
     }
     function getsubprocesos($params=null)
     {
        $id=$params[0];
        echo json_encode($this->model->getsubprocesos($id));
     }
}

?>
