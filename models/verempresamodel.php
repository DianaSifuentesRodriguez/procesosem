<?php 
class VerempresaModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getEmpresa(){
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query=$this->db->connect()->prepare("SELECT * FROM bdprocesos.empresa  where Ruc='$ruc'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
            
            
            }catch(PDOException $e){
                die("Error: ".$e);
                return  "00";
        }
    }

}

?>