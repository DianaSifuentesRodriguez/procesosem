<?php 
class ListaruserModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getUsuario(){
        try{
              require_once 'classes/session.php';
              $se = new Session();
              $query=$this->db->connect()->prepare("SELECT * FROM bdprocesos.usuario");
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