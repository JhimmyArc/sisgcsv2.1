<?php
require_once 'model/login.model.php';

class LoginController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new loginModel();
    }

    //Llamado plantilla principal
    public function Index(){
        $user = new loginModel();

        if($user->is_loggedin()!="")
        {
         $user->redirect('?c=login');
        } 
    }

    public function Login(){
        require_once 'view/login.php';   
    }

    public function Ingresar(){
        $user = new loginModel();
        if(isset($_POST['btn-login']))
        {
         $usuario = $_POST['usuario'];
         $clave = $_POST['clave'];
          
         if($user->userLogin($usuario,$clave))
         {
          $user->redirect('?c=proyecto&a=Index');
         }
         else
         {
          $user->redirect('index.php?c=login&m=1');
         } 
        }

    }

    public function Salir(){
        $user = new loginModel();
        $this->model->Logout();
        $user->redirect('index.php?c=login&m=2');
    }

}

?>