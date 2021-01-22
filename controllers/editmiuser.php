<?php 
class Editmiuser extends SessionController{
  
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();
        
    }
    function render(){
        $this->view->render('editmiuser/index');
    }

    function getPersonabyId(){
        $user = new UserModel();
        echo json_encode($user->getPersonById($this->user->getIdUsuario()));
      }

    function updatePassword(){
        require_once 'classes/session.php';
        $se = new Session();
        $dni = $se->getCurrentUser();
        $user = new UserModel();
       $current = $this->getPost('current_password');
       $new     = $this->getPost('new_password');
       $band= $user->comparePasswords($current,$dni);
       if($band){
         $user->updatePassword($new,$dni);
         echo "01";
       }else{
         echo '02';
       }      
      }

      // function updateInformacion(){
      //   $dni=$this->user->getIdUsuario();
      //   $email=$_POST['Email'];
      //   $dom=$_POST['Domicilio'];
      //   $tel=$_POST['Telefono'];
      //   require_once 'models/usuariomodel.php';
      //   $usuarioModel = new UsuarioModel();
        
      //   echo $usuarioModel->updateMyUser(['Email'=>$email,'Domicilio'=>$dom,
      //   'Telefono'=>$tel,'Dni'=>$dni]);
      //  }
    function getUserSessionData(){
        $id = $this->session->getCurrentUser();
        $this->user = new UserModel();
        $this->user->get($id);
       
        return $this->user;
        }
    function getUsuario(){
          
            echo json_encode($this->model->getUsuario());
        }
      
  
    function updateUsuario(){
        
           
            $email=$_POST['Email'];
            $dom=$_POST['Domicilio'];
            $tel=$_POST['Telefono'];
            
            
            echo $this->model->updateUsuario(['Email'=>$email,'Domicilio'=>$dom,
            'Telefono'=>$tel]); 
           }
}
