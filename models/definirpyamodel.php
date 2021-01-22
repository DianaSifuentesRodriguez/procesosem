<?php 
class DefinirpyaModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    //Insertar una Area
    public function newareas($param){
        
        try{
        require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query = $this->db->connect()->prepare("INSERT INTO bdprocesos.area values (null,'$param','$ruc')");
            $query->execute();
            return "01";
        }catch(PDOException $e){
            return '00';
        }
    }
    // Traer la descripcion de los procesos
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
    //Traer la descripcon de las areas
    public function getareas()
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $ruc = $se->getCurrentRUC();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.area where Ruc='$ruc'");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }
    //Traer los subprocesos de un area definida
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

?>