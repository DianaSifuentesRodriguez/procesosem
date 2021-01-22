<?php 
class RproysubModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function newpro($param){
        
        try{
        require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("INSERT INTO bdprocesos.procesos values (null,'$param','$ruc')");
            $query->execute();
            return "01";
        }catch(PDOException $e){
            return '00';
        }
    }
    public function getprocesos()
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.procesos where Ruc='$ruc'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }
    public function updateProcesos($id,$param)
    {
        try {

            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("UPDATE bdprocesos.procesos set Descripcion='$param' where IdProceso='$id' and Ruc='$ruc'");
            $query->execute();
            return "01";
        } catch (PDOException $e) {
            return "00";
        }
    }
    public function getsubprocesos($proceso)
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.sub_procesos where IdProceso='$proceso'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }
}
