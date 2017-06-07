<?php

class RolModel 
{  
    private $pdo;

    public $ROLid;
    public $ROLnombre;
    public $ROLdescripcion;
    public $ROLestado;

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

    public function RegistrarRol(RolModel $data)
    {
        try 
        {
        $sql = "INSERT INTO sgcsROLtRol (ROLnombre,ROLdescripcion,ROLestado) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->ROLnombre,
                $data->ROLdescripcion,
                $data->ROLestado
                )
            );
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarRol($data)
    {
        try
        {
        $sql = "UPDATE sgcsROLtRol SET
                    ROLnombre  = ?,
                    ROLdescripcion  = ?,
                    ROLestado      = ?
                WHERE ROLid = ?";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                $data->ROLnombre,
                $data->ROLdescripcion,
                $data->ROLestado,
                $data->ROLid
                )
            );
        } 
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }
    
    public function ListarRol()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsROLtRol");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerRol($ROLid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsROLtRol as rol 
                                            WHERE rol.ROLid = ?");
            $stm->execute(array($ROLid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function DesabilitarRol($ROLid)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsROLtRol WHERE ROLid = ?");

            $stm->execute(array($ROLid));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

}
?>