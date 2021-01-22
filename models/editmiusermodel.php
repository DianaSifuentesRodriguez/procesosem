<?php 
class EditmiuserModel extends Model{
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
          print_r('Error connection: ' . $e->getMessage());
          return $e->getMessage();
      }
    }

    public function updateUsuario($datos){
        try{
          require_once 'classes/session.php';
          $se = new Session();
          $dni = $se->getCurrentUser();
          $query= $this->db->connect()->prepare('UPDATE bdprocesos.usuario set Email = :Email, Domicilio =:Domicilio,Telefono = :Telefono where Dni = :Dni');
          $query->execute(['Email'=>$datos['Email'],'Domicilio'=>$datos['Domicilio'],'Telefono'=>$datos['Telefono'],'Dni'=>$dni]);
          $query->execute();
               echo "ok";
            }catch(PDOException $e){
               return false;
          }
      }

}

?>