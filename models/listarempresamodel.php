<?php 
class ListarempresaModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getEmpresa(){
        try{
              require_once 'classes/session.php';
              $se = new Session();
              $query=$this->db->connect()->prepare("SELECT * FROM bdprocesos.empresa");
              $query->setFetchMode(PDO::FETCH_ASSOC);
              $query->execute();
              return $query->fetchAll();
  
        }catch(PDOException $e){
            die("Error: ".$e);
            return  "00";
      }
    }

}

?>