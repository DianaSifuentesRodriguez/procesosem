<?php 
class EdituserModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    //Traer descripcion de la empresa
    public function getempresa()
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.empresa where Ruc='$ruc'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }
//Traer descripcion de rol de susuarios
    public function getrol($idRol)
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.rol where IdRol='$idRol'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }


}

?>