<?php

class LoginModel
{
	private $pdo;

    public $clave;
    public $usuario;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
    /*Funcion Logueo o Iniciar sesion*/
	public function userLogin($usuario,$clave)
	{
		try
   		{
          $stmt = $this->pdo->prepare("SELECT USUcodigo,USUclave,USUusuario,USUnombre,TUSid FROM sgcsUSUtUsuario WHERE USUusuario=:usuario  LIMIT 1");
          $stmt->execute(array(':usuario'=>$usuario));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

          	if($stmt->rowCount() == 1)
			{
				if(password_verify($clave, $userRow['USUclave']))
				{
					$_SESSION['user_session'] = $userRow['USUcodigo'];
					$_SESSION['ses_nombre'] = $userRow['USUnombre'];
					$_SESSION['tipousuario_session'] = $userRow['TUSid'];
					return true;
				}
				else
				{
					return false;
				}
			}
        }

        catch(PDOException $e)
        {
           echo $e->getMessage();
        }
	}

	/*Funcion Salir o Cerrar sesion*/
	public function Logout()
	{
		 session_destroy();
         unset($_SESSION['user_session']);
         unset($_SESSION['ses_nombre']);
          unset($_SESSION['tipousuario_session']);
         return true;
		//header("Location:" . Database::ruta() . "?accion=login&m=3");exit;
	}

	function redirect($url){
        header("location: {$url}");
    }

    public function is_loggedin()
    {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
    }

      
}