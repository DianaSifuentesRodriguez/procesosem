<?php 
class AddpysModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insertarp($datos)
    {
        try{
            $query= $this->db->connect()->prepare('INSERT INTO bdprocesos.procesos values (:IdProceso,:Descripcion,:Ruc)');
            $query->execute(['IdProceso'=>$datos['IdProceso'],'Descripcion'=>$datos['Descripcion'],'Ruc'=>$datos['Ruc']]); 

            $query= $this->db->connect()->prepare('INSERT INTO bdprocesos.sub_procesos values (:IdSub,:Descripcion,:IdProceso)');
            $query->execute(['IdSub'=>$datos['IdSub'],'Descripcion'=>$datos['Descripcion'],'IdProceso'=>$datos['IdProceso']]); 

            return "Great";               
          }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
            return $e->getMessage();
        }
    }


}

?>