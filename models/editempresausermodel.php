<?php 
class EditempresauserModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    //Traer los datos de la empresa
    public function getEmpresa(){
      try{
        require_once 'classes/session.php';
        $se = new Session();
        $ruc = $se->getCurrentRUC();
        $query=$this->db->connect()->prepare("SELECT * FROM bdprocesos.empresa where Ruc='$ruc'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);

      }catch(PDOException $e){
        die("Error: ".$e);
        return  "00";
    }
  }
// actualizar los datos de la empresa
  public function updateEmpresa($datos){
    try{
          require_once 'classes/session.php';
          $se = new Session();
          $query= $this->db->connect()->prepare('UPDATE bdprocesos.empresa set NombreComercial = :NombreComercial,RazonSocial = :RazonSocial,Email = :Email, Direccion = :Direccion, Telefono=:Telefono where Ruc=:Ruc');
          $query->execute(['NombreComercial'=>$datos['NombreComercial'],'RazonSocial'=>$datos['RazonSocial'],'Email'=>$datos['Email'],'Direccion'=>$datos['Direccion'],'Telefono'=>$datos['Telefono'],'Ruc'=>$datos['Ruc']]);
          return "01";

        }catch(PDOException $e){
          return "00";
      }
  }

}
