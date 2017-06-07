<?php

class UsuarioModel 
{  
    private $pdo;

    public $USUcodigo;
    public $TUSid;
    public $ESPid;
    public $USUnombre;
    public $USUapellido;
    public $USUtelefono;
    public $USUdniruc;
    public $USUcorreo;
    public $USUusuario;
    public $USUclave;
    public $USUestado;
    public $USUfechaNacimiento;
    public $USUempresa;

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

    public function RegistrarUsuario(UsuarioModel $data)
    {
        //print_r($_POST);
        try 
        {
        $sql = "INSERT INTO sgcsUSUtUsuario (TUSid,ESPid,USUnombre,USUapellido,USUtelefono,USUdniruc,USUcorreo,USUusuario,USUclave,USUestado,USUfechaNacimiento,USUempresa) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->TUSid,
                $data->ESPid,
                $data->USUnombre,
                $data->USUapellido,
                $data->USUtelefono,
                $data->USUdniruc,
                $data->USUcorreo,
                $data->USUusuario,
                $data->USUclave,
                $data->USUestado,
                $data->USUfechaNacimiento,
                $data->USUempresa
                )
            );
        }
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarUsuario($data)
    {
        try
        {
        $sql = "UPDATE sgcsUSUtUsuario SET
                    TUSid        = ?,
                    ESPid        = ?,
                    USUnombre    = ?,
                    USUapellido        = ?,
                    USUtelefono        = ?,
                    USUdniruc        = ?,
                    USUcorreo        = ?,
                    USUusuario        = ?,
                    USUclave        = ?,
                    USUestado        = ?,
                    USUfechaNacimiento  = ?,
                    USUempresa        = ?
                WHERE USUcodigo = ?";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->TUSid,
                $data->ESPid,
                $data->USUnombre,
                $data->USUapellido,
                $data->USUtelefono,
                $data->USUdniruc,
                $data->USUcorreo,
                $data->USUusuario,
                $data->USUclave,
                $data->USUestado,
                $data->USUfechaNacimiento,
                $data->$USUempresa,
                $data->USUcodigo
            )
            );
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function ListarUsuario()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsUSUtUsuario as usu 
                                                    inner join sgcsTUStTipoUsuario as tus on usu.TUSid=tus.TUSid 
                                                    inner join sgcsesptespecialidad as esp on esp.ESPid=usu.ESPid
                                                order by usu.USUcodigo DESC");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarEspecialidad()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsESPtEspecialidad where ESPid>='2'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


    public function ListarTipoUSuario()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsTUStTipoUsuario where TUSid>='2'");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerUsuario($USUcodigo)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsUSUtUsuario as usu 
                                                        inner join sgcsTUStTipoUsuario as tus on usu.TUSid=tus.TUSid 
                                                        inner join sgcsESPtEspecialidad as esp on usu.ESPid=esp.ESPid
                                                 WHERE usu.USUcodigo = ?");
            $stm->execute(array($USUcodigo));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function DesabilitarUsuario($USUcodigo)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsUSUtUsuario WHERE USUcodigo = ?");

            $stm->execute(array($USUcodigo));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>