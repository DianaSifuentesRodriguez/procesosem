<?php 
class PerfiluserModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getUsuario(){
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $dni = $se->getCurrentUser();
            $query=$this->db->connect()->prepare("SELECT * FROM bdprocesos.usuario  where Dni='$dni'");
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