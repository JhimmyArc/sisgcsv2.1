<?php

class MetodologiaModel 
{  
    private $pdo;

    public $METid;
    public $METnombre;
    public $METdescripcion;


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
  
    public function RegistrarMetodologia(MetodologiaModel $data)
    {
        //print_r($_POST);
        try 
        {
        $sql = "INSERT INTO sgcsPROpProyecto (METnombre,METdescripcion) 
                VALUES (?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->METnombre,
                    $data->METdescripcion
                    )
                );
        } 
        catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function ActualizarMetodologia($data)
    {
        try
        {
        $sql = "UPDATE sgcsMETpMetodologia SET
                    METnombre      = ?,
                    METdescripcion = ?
                WHERE METid = ?";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->METnombre,
                    $data->METdescripcion,
                    $data->METid
                )
            );
        } 
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarMetodologia()
    {
        try
        {
            $result = array();
            $stm = $this->pdo->prepare("SELECT * FROM sgcsMETpMetodologia");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ObtenerMetodologia($METid)
    {
        try
        {
            $stm = $this->pdo->prepare("SELECT * FROM sgcsMETpMetodologia WHERE METid = ?");
            $stm->execute(array($METid));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function EliminarMetodologia($METid)
    {
        try
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM sgcsMETpMetodologia WHERE METid = ?");

            $stm->execute(array($METid));
        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }


}

?>