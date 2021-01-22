<?php 
class Addpys extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    function render(){
        $this->view->render('addpys/index');
    }
    function insertarp(){
        $id= $_POST['IdProceso'];
        $des= $_POST['Descripcion'];
        $ruc= $_POST['Ruc'];

        $ide= $_POST['IdSub'];
        $desc= $_POST['Descripcion'];
        $idp= $_POST['IdProceso'];

        echo $this->model->insertarp(['IdProceso'=>$id,'Descripcion'=>$des,'Ruc'=>$ruc,'IdSub'=>$ide,'Descripcion'=>$desc,'IdProceso'=>$idp]);
    } 
    
}

?>
