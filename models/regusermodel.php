<?php 
class ReguserModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    //Insertar Usuarios
    public function insertUsuario($datos){
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $query= $this->db->connect()->prepare('INSERT INTO bdprocesos.usuario values (:Dni,:Nombre,:Apellidos,:Email,:Domicilio,:Telefono,:Password,:IdRol,:Ruc)');
    
             $query->execute(['Dni'=>$datos['Dni'],'Nombre'=>$datos['Nombre'],'Apellidos'=>$datos['Apellidos'],'Email'=>$datos['Email'],'Domicilio'=>$datos['Domicilio'],'Telefono'=>$datos['Telefono'],'Password'=>$datos['Password'],'IdRol'=>$datos['IdRol'],'Ruc'=>$datos['Ruc']]);
                return "01";
        }catch(PDOException $e){
                return '00';
            }
    }

  //Traer descripcion de la empresa
    public function getempresa()
    {
        try{
            require_once 'classes/session.php';
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.empresa");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }
//Traer descripcion de rol de susuarios
    public function getrol()
    {
        try{
            require_once 'classes/session.php';
            $se = new Session();
            $query= $this->db->connect()->prepare("SELECT * from bdprocesos.rol");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
            return $query->fetchAll();
            
        }catch(Exception $e){
            die("Error: ".$e);
            return  "00";
        }
    }

public function getUsuario($dni){
    try{
      $query=$this->db->connect()->prepare("SELECT * FROM usuario  where Dni='$dni'");
      $query->setFetchMode(PDO::FETCH_ASSOC);
      $query->execute();
      return $query->fetch(PDO::FETCH_ASSOC);
    
      
    }catch(PDOException $e){
      print_r('Error connection: ' . $e->getMessage());
      return $e->getMessage();
  }
}
  //aqui va la funcion igual a la de arriba
  public function updateUsuario($datos){
    try{
      $query= $this->db->connect()->prepare('UPDATE usuario set Email = :Email, Domicilio =:Domicilio,Telefono = :Telefono, Ruc = :Ruc, IdRol = :IdRol where Dni = :Dni');
      $query->execute(['Email'=>$datos['Email'],'Domicilio'=>$datos['Domicilio'],'Telefono'=>$datos['Telefono'],'Ruc'=>$datos['Ruc'],'IdRol'=>$datos['IdRol'],'Dni'=>$datos['Dni']]);
      
      $query->execute();
           return true;
        }catch(PDOException $e){
           return false;
      }
  }
  public function updateMyUser($datos){
    try{
      $query= $this->db->connect()->prepare('UPDATE usuario set Email = :Email, Domicilio =:Domicilio,Telefono = :Telefono where Dni = :Dni');
      $query->execute(['Email'=>$datos['Email'],'Domicilio'=>$datos['Domicilio'],'Telefono'=>$datos['Telefono'],'Dni'=>$datos['Dni']]);
      $query->execute();
           echo "ok";
        }catch(PDOException $e){
           return false;
      }
  }




}
