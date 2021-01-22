<?php
class Rproysub extends SessionController{
     function __construct(){
         parent::__construct();
         
         
     }
     function render(){
        $this->view->render('rproysub/index');
     }
     function newproceso()
     {
        $pro=$this->getPost('np');
        echo $this->model->newpro($pro);

     }
     function getprocesos()
     {
        echo json_encode($this->model->getprocesos());
     }
     function updateProcesos(){

        $id=$this->getPost('idp');
        $param=$this->getPost('des');
        echo $this->model->updateProcesos($id,$param);
     }
     function newsubproceso()
     {
        $pro=$this->getPost('');
        echo $this->model->newpro($pro);

     }
     function getsubprocesos($params=null)
     {
        $id=$params[0];
        echo json_encode($this->model->getsubprocesos($id));
     }
     function updateSubprocesos(){

        $id=$this->getPost('idsp');
        $param=$this->getPost('desc');
        echo $this->model->updateProcesos($id,$param);
     }
 }

?>
